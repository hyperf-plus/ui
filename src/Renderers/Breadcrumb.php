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
 * Breadcrumb 面包屑 https://aisuda.bce.baidu.com/amis/zh-CN/components/breadcrumb.
 *
 * @version 6.2.2
 */
class Breadcrumb extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'breadcrumb');
    }

    /**
     * 外层类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 下拉菜单类名.
     * @param mixed $value
     */
    public function dropdownClassName($value = '')
    {
        return $this->set('dropdownClassName', $value);
    }

    /**
     * 下拉菜单项类名.
     * @param mixed $value
     */
    public function dropdownItemClassName($value = '')
    {
        return $this->set('dropdownItemClassName', $value);
    }

    /**
     * 导航项类名.
     * @param mixed $value
     */
    public function itemClassName($value = '')
    {
        return $this->set('itemClassName', $value);
    }

    /**
     * 文本.
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
    }

    /**
     * 最大展示长度.
     * @param mixed $value
     */
    public function labelMaxLength($value = '')
    {
        return $this->set('labelMaxLength', $value);
    }

    /**
     * 分隔符.
     * @param mixed $value
     */
    public function separator($value = '')
    {
        return $this->set('separator', $value);
    }

    /**
     * 分割符类名.
     * @param mixed $value
     */
    public function separatorClassName($value = '')
    {
        return $this->set('separatorClassName', $value);
    }

    /**
     * 动态数据.
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
    }

    /**
     * 浮窗提示位置.
     * @param mixed $value
     */
    public function tooltipPosition($value = '')
    {
        return $this->set('tooltipPosition', $value);
    }

    /**
     * 指定为 breadcrumb 渲染器。
     * @param mixed $value
     */
    public function type($value = 'breadcrumb')
    {
        return $this->set('type', $value);
    }
}
