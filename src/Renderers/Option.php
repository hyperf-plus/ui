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
 * Option.
 *
 * @version 6.2.2
 */
class Option extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 支持嵌套.
     * @param mixed $value
     */
    public function children($value = '')
    {
        return $this->set('children', $value);
    }

    /**
     * 标记后数据延时加载.
     * @param mixed $value
     */
    public function defer($value = true)
    {
        return $this->set('defer', $value);
    }

    /**
     * 如果设置了，优先级更高，不设置走 source 接口加载。
     * @param mixed $value
     */
    public function deferApi($value = '')
    {
        return $this->set('deferApi', $value);
    }

    /**
     * 描述，部分控件支持
     * @param mixed $value
     */
    public function description($value = '')
    {
        return $this->set('description', $value);
    }

    /**
     * 是否禁用.
     * @param mixed $value
     */
    public function disabled($value = true)
    {
        return $this->set('disabled', $value);
    }

    /**
     * 最好不要用！因为有 visible 就够了。
     * @param mixed $value
     */
    public function hidden($value = true)
    {
        return $this->set('hidden', $value);
    }

    /**
     * 用来显示的文字.
     * @param mixed $value
     */
    public function label($value = '')
    {
        return $this->set('label', $value);
    }

    /**
     * 只有设置了 defer 才有意义，内部字段不可以外部设置.
     * @param mixed $value
     */
    public function loaded($value = true)
    {
        return $this->set('loaded', $value);
    }

    /**
     * 标记正在加载。只有 defer 为 true 时有意义。内部字段不可以外部设置.
     * @param mixed $value
     */
    public function loading($value = true)
    {
        return $this->set('loading', $value);
    }

    /**
     * 可以用来给 Option 标记个范围，让数据展示更清晰。这个只有在数值展示的时候显示。
     * @param mixed $value
     */
    public function scopeLabel($value = '')
    {
        return $this->set('scopeLabel', $value);
    }

    /**
     * 请保证数值唯一，多个选项值一致会认为是同一个选项。
     * @param mixed $value
     */
    public function value($value = '')
    {
        return $this->set('value', $value);
    }

    /**
     * 是否可见
     * @param mixed $value
     */
    public function visible($value = true)
    {
        return $this->set('visible', $value);
    }
}
