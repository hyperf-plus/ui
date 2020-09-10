<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;


use Hyperf\Utils\Arr;

class In extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereIn';

    /**
     * Get condition of this filter.
     *
     * @param array $inputs
     *
     * @return mixed
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if (is_null($value)) {
            return;
        }

        $this->value = (array)$value;

        return $this->buildCondition($this->column, $this->value);
    }
}
