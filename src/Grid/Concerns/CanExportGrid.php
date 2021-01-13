<?php

namespace HPlus\UI\Grid\Concerns;

use HPlus\UI\Grid\Exporter;
use HPlus\UI\Grid\Exporters\AbstractExporter;

trait CanExportGrid
{
    /**
     * Export driver.
     *
     * @var string
     */
    protected $exporter;

    protected $enableExport = false;

    /**
     * Handle export request.
     *
     * @param bool $forceExport
     */
    public function handleExportRequest()
    {
        if (!$scope = request()->query(Exporter::$queryName)) {
            return;
        }
        $this->hidePage();
        return $this->getExporter($scope)->export();
    }

    /**
     * @param string $scope
     *
     * @return AbstractExporter
     */
    protected function getExporter($scope)
    {
        return (new Exporter($this))->resolve($this->exporter)->withScope($scope);
    }

    /**
     * Set exporter driver for Table to export.
     *
     * @param $exporter
     *
     * @return $this
     */
    public function exporter($exporter)
    {
        $this->enableExport = true;
        $this->exporter = $exporter;
        return $this;
    }

    /**
     * Get the export url.
     *
     * @param int $scope
     * @param null $args
     *
     * @return string
     */
    public function getExportUrl($scope = 1, $args = null)
    {
        $input = array_merge(request()->all(), Exporter::formatExportQuery($scope, $args));

        if ($constraints = $this->model()->getConstraints()) {
            $input = array_merge($input, $constraints);
        }

        return $this->resource() . '?' . http_build_query($input);
    }

    /**
     * @param \Closure $callback
     */
    public function export(\Closure $callback)
    {
        $this->enableExport = true;
        if (!$scope = request()->query(Exporter::$queryName)) {
            return;
        }

        $this->getExporter($scope)->setCallback($callback);

        return $this;
    }
}
