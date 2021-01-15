<?php

namespace HPlus\UI\Grid\Exporters;

use HPlus\UI\Grid\Column;
use Hyperf\Database\Model\Collection;
use Hyperf\HttpMessage\Stream\SwooleFileStream;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Utils\Str;

class CsvExporter extends AbstractExporter
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var \Closure
     */
    protected $callback;

    /**
     * @var array
     */
    protected $exceptColumns;

    /**
     * @var array
     */
    protected $onlyColumns;

    /**
     * @var []\Closure
     */
    protected $columnCallbacks;

    /**
     * @var []\Closure
     */
    protected $titleCallbacks;

    /**
     * @var array
     */
    protected $visibleColumns;

    /**
     * @var array
     */
    protected $columnUseOriginalValue;

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function filename(string $filename = ''): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @param \Closure $closure
     */
    public function setCallback(\Closure $closure): self
    {
        $this->callback = $closure;

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function except(array $columns = []): self
    {
        $this->exceptColumns = $columns;

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function only(array $columns = []): self
    {
        $this->onlyColumns = $columns;

        return $this;
    }

    /**
     * @param array $columns
     *
     * @return $this
     */
    public function originalValue($columns = []): self
    {
        $this->columnUseOriginalValue = $columns;

        return $this;
    }

    /**
     * @param string $name
     * @param \Closure $callback
     *
     * @return $this
     */
    public function column(string $name, \Closure $callback): self
    {
        $this->columnCallbacks[$name] = $callback;

        return $this;
    }

    /**
     * @param string $name
     * @param \Closure $callback
     *
     * @return $this
     */
    public function title(string $name, \Closure $callback): self
    {
        $this->titleCallbacks[$name] = $callback;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function export()
    {
        if ($this->callback) {
            call_user_func($this->callback, $this);
        }
        $titles = [];
        $items = collect();
        $columns = $this->grid->getColumns();
        $csv = implode(",", $this->getVisiableTitles()) . PHP_EOL;
        $this->chunk(function ($data, $page) use ($items, $columns, &$csv) {
            $original = $data->toArray();
            // Write rows
            foreach ($original as $index => $record) {
                $csv .= implode(",", $this->getVisiableFields($record, $original[$index])) . PHP_EOL;
            }
        }, 100);
        if (!$this->filename) {
            $this->filename = $this->grid->getTable() . ".csv";
        }
        $response = new \Hyperf\HttpServer\Response();
        $response = $response->withHeader('Content-Type', 'text/csv;charset=UTF-8');
        $response = $response->withHeader('Expires', '0');
        $response = $response->withHeader('Pragma', 'public');
        $response = $response->withHeader('Content-Transfer-Encoding', 'binary');
        $response = $response->withHeader('Content-Disposition', 'attachment;filename=' . $this->filename);
        return $response->withBody(new SwooleStream($csv));
    }

    /**
     * @return array
     */
    protected function getVisiableTitles()
    {
        $titles = collect($this->grid->getColumns())
            ->mapWithKeys(function (Column $column) {
                $columnName = $column->getName();
                $columnTitle = $column->getLabel();
                if (isset($this->titleCallbacks[$columnName])) {
                    $columnTitle = $this->titleCallbacks[$columnName]($columnTitle);
                }
                return [$columnName => $columnTitle];
            });

        if ($this->onlyColumns) {
            $titles = $titles->only($this->onlyColumns);
        }

        if ($this->exceptColumns) {
            $titles = $titles->except($this->exceptColumns);
        }

        $this->visibleColumns = $titles->keys();

        return $titles->values()->toArray();
    }

    /**
     * @param array $value
     * @param array $original
     *
     * @return array
     */
    public function getVisiableFields(array $value, array $original): array
    {
        $fields = [];
        foreach ($this->visibleColumns as $column) {
            $fields[] = $this->getColumnValue(
                $column,
                data_get($value, $column),
                data_get($original, $column)
            );
        }
        return $fields;
    }

    /**
     * @param string $column
     * @param mixed $value
     * @param mixed $original
     *
     * @return mixed
     */
    protected function getColumnValue(string $column, $value, $original)
    {
        if (!empty($this->columnUseOriginalValue)
            && in_array($column, $this->columnUseOriginalValue)) {
            return $original;
        }

        if (isset($this->columnCallbacks[$column])) {
            return $this->columnCallbacks[$column]($value, $original);
        }

        return $value;
    }
}
