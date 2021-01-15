<?php

namespace HPlus\UI\Grid\Exporters;


use HPlus\UI\Grid;

abstract class AbstractExporter implements ExporterInterface
{
    /**
     * @var Grid
     */
    protected $grid;

    /**
     * @var int
     */
    protected $page;

    /**
     * Create a new exporter instance.
     *
     * @param $grid
     */
    public function __construct(Grid $grid = null)
    {
        if ($grid) {
            $this->setGrid($grid);
        }
    }

    public function setGrid(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Get grid of grid.
     *
     * @return string
     */
    public function getGrid()
    {
        return $this->grid;
    }

    /**
     * Get data with export query.
     *
     * @param bool $toArray
     *
     * @return array|\Illuminate\Support\Collection|mixed
     */
    public function getData($toArray = true)
    {
        return $this->grid->applyFilter($toArray);
    }

    /**
     * @param callable $callback
     * @param int $count
     *
     * @return bool
     */
    public function chunk(callable $callback, $count = 100)
    {
        //加上快速搜索条件
        return $this->grid->getFilter()->chunk($callback, $count);
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        return collect($this->getData());
    }

    /**
     * @return Builder|Model
     */
    public function getQuery()
    {
        $model = $this->grid->model();

        $queryBuilder = $model->newQuery();

        // Export data of giving page number.
        if ($this->page) {
            $keyName = $this->grid->getKeyName();
            $perPage = request()->query($model->getPerPageName(), $model->getPerPage());
            $scope = (clone $queryBuilder)
                ->select([$keyName])
                ->setEagerLoads([])
                ->forPage($this->page, $perPage)->get();
            // If $querybuilder is a Model, it must be reassigned, unless it is a eloquent/query builder.
            $queryBuilder = $queryBuilder->whereIn($keyName, $scope->pluck($keyName));
        }

        return $queryBuilder;
    }

    /**
     * Export data with scope.
     *
     * @param string $scope
     *
     * @return $this
     */
    public function withScope($scope)
    {
        if ($scope == Grid\Exporter::SCOPE_ALL) {
            return $this;
        }

        if ($scope == Grid\Exporter::SCOPE_WHERE) {
            $this->grid->applyWhere();
            return $this;
        }

        list($scope, $args) = explode(':', $scope);
        if ($scope == Grid\Exporter::SCOPE_CURRENT_PAGE) {
            $this->grid->model()->usePaginate(true);
            $this->page = $args ?: 1;
        }

        if ($scope == Grid\Exporter::SCOPE_SELECTED_ROWS) {
            $selected = explode(',', $args);
            $this->grid->model()->whereIn($this->grid->getKeyName(), $selected);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function export();
}
