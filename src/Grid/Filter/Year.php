<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

class Year extends Date
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereYear';

    /**
     * @var string
     */
    protected $fieldName = 'year';
}
