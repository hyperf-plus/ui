<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

class NotIn extends In
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereNotIn';
}
