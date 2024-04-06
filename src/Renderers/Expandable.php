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
 * Expandable.
 *
 * @version 6.2.2
 */
class Expandable extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 行是否可展开表达式.
     * @param mixed $value
     */
    public function expandableOn($value = '')
    {
        return $this->set('expandableOn', $value);
    }

    /**
     * 展开行自定义样式表达式.
     * @param mixed $value
     */
    public function expandedRowClassNameExpr($value = '')
    {
        return $this->set('expandedRowClassNameExpr', $value);
    }

    /**
     * 已展开的key值
     * @param mixed $value
     */
    public function expandedRowKeys($value = '')
    {
        return $this->set('expandedRowKeys', $value);
    }

    /**
     * 已展开的key值表达式.
     * @param mixed $value
     */
    public function expandedRowKeysExpr($value = '')
    {
        return $this->set('expandedRowKeysExpr', $value);
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
     * 对应渲染器类型.
     * @param mixed $value
     */
    public function type($value = '')
    {
        return $this->set('type', $value);
    }
}
