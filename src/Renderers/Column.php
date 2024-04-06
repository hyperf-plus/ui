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
 * Column.
 *
 * @version 6.2.2
 */
class Column extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 内容居左、居中、居右.
     * @param mixed $value
     */
    public function align($value = '')
    {
        return $this->set('align', $value);
    }

    /**
     * 表格列单元格是否可以获取父级数据域值，默认为true，该配置对当前列内单元格生效.
     * @param mixed $value
     */
    public function canAccessSuperData($value = true)
    {
        return $this->set('canAccessSuperData', $value);
    }

    /**
     * 表头分组.
     * @param mixed $value
     */
    public function children($value = '')
    {
        return $this->set('children', $value);
    }

    /**
     * 列样式.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 单元格样式.
     * @param mixed $value
     */
    public function classNameExpr($value = '')
    {
        return $this->set('classNameExpr', $value);
    }

    /**
     * 指定列合并表达式.
     * @param mixed $value
     */
    public function colSpanExpr($value = '')
    {
        return $this->set('colSpanExpr', $value);
    }

    /**
     * 可复制.
     * @param mixed $value
     */
    public function copyable($value = true)
    {
        return $this->set('copyable', $value);
    }

    /**
     * 兼容table列筛选.
     * @param mixed $value
     */
    public function filterable($value = true)
    {
        return $this->set('filterable', $value);
    }

    /**
     * 是否固定在左侧/右侧.
     * @param mixed $value
     */
    public function fixed($value = '')
    {
        return $this->set('fixed', $value);
    }

    /**
     * 指定列唯一标识.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 配置快速编辑功能.
     * @param mixed $value
     */
    public function quickEdit($value = '')
    {
        return $this->set('quickEdit', $value);
    }

    /**
     * 列表头提示.
     * @param mixed $value
     */
    public function remark($value = '')
    {
        return $this->set('remark', $value);
    }

    /**
     * 指定行合并表达式.
     * @param mixed $value
     */
    public function rowSpanExpr($value = '')
    {
        return $this->set('rowSpanExpr', $value);
    }

    /**
     * 快速搜索.
     * @param mixed $value
     */
    public function searchable($value = true)
    {
        return $this->set('searchable', $value);
    }

    /**
     * 兼容table快速排序.
     * @param mixed $value
     */
    public function sortable($value = true)
    {
        return $this->set('sortable', $value);
    }

    /**
     * 快速排序.
     * @param mixed $value
     */
    public function sorter($value = true)
    {
        return $this->set('sorter', $value);
    }

    /**
     * 指定列标题.
     * @param mixed $value
     */
    public function title($value = '')
    {
        return $this->set('title', $value);
    }

    /**
     * 表头单元格样式.
     * @param mixed $value
     */
    public function titleClassName($value = '')
    {
        return $this->set('titleClassName', $value);
    }

    /**
     * 当前列是否展示.
     * @param mixed $value
     */
    public function toggled($value = true)
    {
        return $this->set('toggled', $value);
    }

    /**
     * 指定列内容渲染器.
     * @param mixed $value
     */
    public function type($value = '')
    {
        return $this->set('type', $value);
    }

    /**
     * @param mixed $value
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }
}
