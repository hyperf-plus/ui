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
 * GridNav 宫格导航.
 *
 * @version 6.2.2
 */
class GridNav extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'grid-nav');
    }

    /**
     * 是否显示列表项边框.
     * @param mixed $value
     */
    public function border($value = true)
    {
        return $this->set('border', $value);
    }

    /**
     * 是否将列表项内容居中显示.
     * @param mixed $value
     */
    public function center($value = true)
    {
        return $this->set('center', $value);
    }

    /**
     * 外层 CSS 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 列数.
     * @param mixed $value
     */
    public function columnNum($value = '')
    {
        return $this->set('columnNum', $value);
    }

    /**
     * 列表项内容排列的方向，可选值为 horizontal 、vertical.
     * @param mixed $value
     */
    public function direction($value = '')
    {
        return $this->set('direction', $value);
    }

    /**
     * 列表项之间的间距，默认单位为px.
     * @param mixed $value
     */
    public function gutter($value = '')
    {
        return $this->set('gutter', $value);
    }

    /**
     * 图标宽度占比，单位%.
     * @param mixed $value
     */
    public function iconRatio($value = '')
    {
        return $this->set('iconRatio', $value);
    }

    /**
     * 列表项 css 类名.
     * @param mixed $value
     */
    public function itemClassName($value = '')
    {
        return $this->set('itemClassName', $value);
    }

    /**
     * 列表项图标.
     * @param mixed $value
     */
    public function options($value = '')
    {
        return $this->set('options', $value);
    }

    /**
     * 是否调换图标和文本的位置.
     * @param mixed $value
     */
    public function reverse($value = true)
    {
        return $this->set('reverse', $value);
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
     * 是否将列表项固定为正方形.
     * @param mixed $value
     */
    public function square($value = true)
    {
        return $this->set('square', $value);
    }

    /**
     * 指定为 grid-nav 渲染器。
     * @param mixed $value
     */
    public function type($value = 'grid-nav')
    {
        return $this->set('type', $value);
    }

    /**
     * 图片数组.
     * @param mixed $value
     */
    public function value($value = '')
    {
        return $this->set('value', $value);
    }
}
