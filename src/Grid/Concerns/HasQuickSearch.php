<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Concerns;


use Mzh\UI\Grid\Column;
use Mzh\UI\Grid\Model;
use Mzh\UI\Grid\Tools\QuickSearch;

/**
 * @method  Model model()
 */
trait HasQuickSearch
{

    /**
     * @property Column[] $columns
     * @var QuickSearch
     */
    public $quickSearch;


    /**
     * 开启快捷搜索
     * @param null $search
     * @return $this
     */
    public function quickSearch($search = null)
    {
        $this->quickSearch = new QuickSearch();
        if (func_num_args() > 1) {
            $this->quickSearch->search = func_get_args();
        } else {
            $this->quickSearch->search = $search;
        }

        return $this;
    }

    /**
     * 设置快捷搜索占位符，开启快捷搜索后生效
     * @param $placeholder
     * @return $this
     */
    public function quickSearchPlaceholder($placeholder)
    {
        if ($this->quickSearch) $this->quickSearch->placeholder = $placeholder;

        return $this;
    }

    /**
     * Apply the search query to the query.
     *
     * @return mixed|void
     */
    protected function applyQuickSearch()
    {

        if (!$this->quickSearch) {
            return;
        }

        if (!$query = request()->query($this->quickSearch->searchKey)) {
            return;
        }

        if ($this->quickSearch->search instanceof \Closure) {
            return call_user_func($this->quickSearch->search, $this->model(), $query);
        }

        if (is_string($this->quickSearch->search)) {
            $this->quickSearch->search = [$this->quickSearch->search];
        }

        if (is_array($this->quickSearch->search)) {
            $this->model()->where(function ($queryW) use ($query) {
                foreach ($this->quickSearch->search as $key => $column) {
                    $this->addWhereLikeBinding($queryW, $column, true, '%' . $query . '%');
                }
            });

        } elseif (is_null($this->quickSearch->search)) {
            $this->addWhereBindings($query);
        }
    }

    /**
     * Add where bindings.
     *
     * @param string $query
     */
    protected function addWhereBindings($query)
    {
        $queries = preg_split('/\s(?=([^"]*"[^"]*")*[^"]*$)/', trim($query));

        foreach ($this->parseQueryBindings($queries) as list($column, $condition, $or)) {
            if (preg_match('/(?<not>!?)\((?<values>.+)\)/', $condition, $match) !== 0) {
                $this->addWhereInBinding($column, $or, (bool)$match['not'], $match['values']);
                continue;
            }

            if (preg_match('/\[(?<start>.*?),(?<end>.*?)]/', $condition, $match) !== 0) {
                $this->addWhereBetweenBinding($column, $or, $match['start'], $match['end']);
                continue;
            }

            if (preg_match('/(?<function>date|time|day|month|year),(?<value>.*)/', $condition, $match) !== 0) {
                $this->addWhereDatetimeBinding($column, $or, $match['function'], $match['value']);
                continue;
            }

            if (preg_match('/(?<pattern>%[^%]+%)/', $condition, $match) !== 0) {
                $this->addWhereLikeBinding($column, $or, $match['pattern']);
                continue;
            }

            if (preg_match('/\/(?<value>.*)\//', $condition, $match) !== 0) {
                $this->addWhereBasicBinding($column, $or, 'REGEXP', $match['value']);
                continue;
            }

            if (preg_match('/(?<operator>>=?|<=?|!=|%){0,1}(?<value>.*)/', $condition, $match) !== 0) {
                $this->addWhereBasicBinding($column, $or, $match['operator'], $match['value']);
                continue;
            }
        }
    }

    /**
     * Parse quick query bindings.
     *
     * @param array $queries
     *
     * @return array
     */
    protected function parseQueryBindings(array $queries)
    {
        $columnMap = collect($this->columns)->mapWithKeys(function (Column $column) {
            $label = $column->getLabel();
            $name = $column->getName();
            return [$label => $name, $name => $name];
        });

        return collect($queries)->map(function ($query) use ($columnMap) {
            $segments = explode(':', $query, 2);

            if (count($segments) != 2) {
                return;
            }

            $or = false;

            list($column, $condition) = $segments;

            if (Str::startsWith($column, '|')) {
                $or = true;
                $column = substr($column, 1);
            }

            $column = $columnMap[$column];

            return [$column, $condition, $or];
        })->filter()->toArray();
    }

    /**
     * Add where like binding to model query.
     *
     * @param  $query
     * @param string $column
     * @param bool $or
     * @param string $pattern
     */
    protected function addWhereLikeBinding($query, string $column, bool $or, string $pattern)
    {
        $connectionType = $this->model()->eloquent()->getConnection()->getDriverName();
        $likeOperator = $connectionType == 'pgsql' ? 'ilike' : 'like';

        $method = $or ? 'orWhere' : 'where';

        $query->{$method}($column, $likeOperator, $pattern);
    }

    /**
     * Add where date time function binding to model query.
     *
     * @param string $column
     * @param bool $or
     * @param string $function
     * @param string $value
     */
    protected function addWhereDatetimeBinding(string $column, bool $or, string $function, string $value)
    {
        $method = ($or ? 'orWhere' : 'where') . ucfirst($function);

        $this->model()->{$method}($column, $value);
    }

    /**
     * Add where in binding to the model query.
     *
     * @param string $column
     * @param bool $or
     * @param bool $not
     * @param string $values
     */
    protected function addWhereInBinding(string $column, bool $or, bool $not, string $values)
    {
        $values = explode(',', $values);

        foreach ($values as $key => $value) {
            if ($value === 'NULL') {
                $values[$key] = null;
            }
        }

        $where = $or ? 'orWhere' : 'where';

        $method = $where . ($not ? 'NotIn' : 'In');

        $this->model()->{$method}($column, $values);
    }

    /**
     * Add where between binding to the model query.
     *
     * @param string $column
     * @param bool $or
     * @param string $start
     * @param string $end
     */
    protected function addWhereBetweenBinding(string $column, bool $or, string $start, string $end)
    {
        $method = $or ? 'orWhereBetween' : 'whereBetween';

        $this->model()->{$method}($column, [$start, $end]);
    }

    /**
     * Add where basic binding to the model query.
     *
     * @param string $column
     * @param bool $or
     * @param string $operator
     * @param string $value
     */
    protected function addWhereBasicBinding(string $column, bool $or, string $operator, string $value)
    {
        $method = $or ? 'orWhere' : 'where';

        $operator = $operator ?: '=';

        if ($operator == '%') {
            $operator = 'like';
            $value = "%{$value}%";
        }

        if ($value === 'NULL') {
            $value = null;
        }

        if (Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
            $value = substr($value, 1, -1);
        }

        $this->model()->{$method}($column, $operator, $value);
    }
}
