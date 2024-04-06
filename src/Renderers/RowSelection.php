<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HPlus\UI\Renderers;

/**
 * RowSelection.
 *
 * @version 6.2.2
 */
class RowSelection extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 已选择的key值表达式.
     * @param mixed $value
     */
    public function columnWidth($value = '')
    {
        return $this->set('columnWidth', $value);
    }

    /**
     * 行是否禁用表达式.
     * @param mixed $value
     */
    public function disableOn($value = '')
    {
        return $this->set('disableOn', $value);
    }

    /**
     * 对应数据源的key值
     * @param mixed $value
     */
    public function keyField($value = '')
    {
        return $this->set('keyField', $value);
    }

    /**
     * 是否点击行触发选中或取消选中.
     * @param mixed $value
     */
    public function rowClick($value = true)
    {
        return $this->set('rowClick', $value);
    }

    /**
     * 已选择的key值
     * @param mixed $value
     */
    public function selectedRowKeys($value = '')
    {
        return $this->set('selectedRowKeys', $value);
    }

    /**
     * 已选择的key值表达式.
     * @param mixed $value
     */
    public function selectedRowKeysExpr($value = '')
    {
        return $this->set('selectedRowKeysExpr', $value);
    }

    /**
     * 自定义选择菜单.
     * @param mixed $value
     */
    public function selections($value = '')
    {
        return $this->set('selections', $value);
    }

    /**
     * 选择类型 单选/多选.
     * @param mixed $value
     */
    public function type($value = '')
    {
        return $this->set('type', $value);
    }
}
