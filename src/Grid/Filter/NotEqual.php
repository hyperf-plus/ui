<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;


use Hyperf\Utils\Arr;

class NotEqual extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if (!isset($value)) {
            return;
        }

        $this->value = $value;

        return $this->buildCondition($this->column, '!=', $this->value);
    }
}
