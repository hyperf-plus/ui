<?php

namespace HPlus\UI\Grid\Exporters;

interface ExporterInterface
{
    /**
     * Export data from table.
     *
     * @return mixed
     */
    public function export();
}
