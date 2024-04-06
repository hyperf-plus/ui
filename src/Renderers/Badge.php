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
 * Badge 角标。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/badge.
 *
 * @version 6.2.2
 */
class Badge extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 是否显示动画.
     * @param mixed $value
     */
    public function animation($value = true)
    {
        return $this->set('animation', $value);
    }

    /**
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 提示类型.
     * @param mixed $value
     */
    public function level($value = '')
    {
        return $this->set('level', $value);
    }

    /**
     * 角标类型 可选值: text | dot | ribbon.
     * @param mixed $value
     */
    public function mode($value = '')
    {
        return $this->set('mode', $value);
    }

    /**
     * 角标位置，相对于position的位置进行偏移.
     * @param mixed $value
     */
    public function offset($value = '')
    {
        return $this->set('offset', $value);
    }

    /**
     * 封顶的数字值
     * @param mixed $value
     */
    public function overflowCount($value = '')
    {
        return $this->set('overflowCount', $value);
    }

    /**
     * 角标位置 可选值: top-right | top-left | bottom-right | bottom-left.
     * @param mixed $value
     */
    public function position($value = '')
    {
        return $this->set('position', $value);
    }

    /**
     * 大小.
     * @param mixed $value
     */
    public function size($value = '')
    {
        return $this->set('size', $value);
    }

    /**
     * 角标的自定义样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 文本内容.
     * @param mixed $value
     */
    public function text($value = '')
    {
        return $this->set('text', $value);
    }

    /**
     * 动态控制是否显示.
     * @param mixed $value
     */
    public function visibleOn($value = '')
    {
        return $this->set('visibleOn', $value);
    }
}
