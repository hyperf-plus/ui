<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

class Date extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereDate';

    /**
     * @var string
     */
    protected $fieldName = 'date';

    /**
     * {@inheritdoc}
     */
    public function __construct($column, $label = '')
    {
        parent::__construct($column, $label);

    }
}
