<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Concerns;


trait HasDefaultSort
{
    protected $defaultSort;

    /**
     * @param string $prop 列表字段
     * @param string $order asc|desc
     * @param string $field 排序字段
     * @return $this
     */
    public function defaultSort($prop, $order, $field = null)
    {
        $this->defaultSort = [
            'sort_prop' => $prop,
            'sort_order' => $order,
            'sort_field' => $field ? $field : $prop
        ];
        return $this;
    }

    public function getDefaultSort()
    {
        return $this->defaultSort;
    }

}
