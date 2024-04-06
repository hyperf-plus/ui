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
 * Property 属性表.
 *
 * @version 6.2.2
 */
class Property extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'property');
    }

    /**
     * 外层 dom 的类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 每行几列.
     * @param mixed $value
     */
    public function column($value = '')
    {
        return $this->set('column', $value);
    }

    /**
     * 属性值的样式.
     * @param mixed $value
     */
    public function contentStyle($value = '')
    {
        return $this->set('contentStyle', $value);
    }

    /**
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
    }

    /**
     * 属性名的样式.
     * @param mixed $value
     */
    public function labelStyle($value = '')
    {
        return $this->set('labelStyle', $value);
    }

    /**
     * 显示模式，目前只有 'table' 和 'simple'.
     * @param mixed $value
     */
    public function mode($value = '')
    {
        return $this->set('mode', $value);
    }

    /**
     * 模式下属性名和值之间的分隔符.
     * @param mixed $value
     */
    public function separator($value = '')
    {
        return $this->set('separator', $value);
    }

    /**
     * 数据源.
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
    }

    /**
     * 外层 dom 的样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 标题.
     * @param mixed $value
     */
    public function title($value = '')
    {
        return $this->set('title', $value);
    }

    /**
     * 指定为 property 渲染器。
     * @param mixed $value
     */
    public function type($value = 'property')
    {
        return $this->set('type', $value);
    }
}
