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
 * Toast 轻提示.
 *
 * @version 6.2.2
 */
class Toast extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 内容.
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * 是否显示关闭按钮.
     * @param mixed $value
     */
    public function closeButton($value = true)
    {
        return $this->set('closeButton', $value);
    }

    /**
     * 轻提示内容.
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
    }

    /**
     * 展示图标，可选'info'/'success'/'error'/'warning'.
     * @param mixed $value
     */
    public function level($value = '')
    {
        return $this->set('level', $value);
    }

    /**
     * 提示显示位置，可选值: top-right | top-center | top-left | bottom-center | bottom-left | bottom-right | center.
     * @param mixed $value
     */
    public function position($value = '')
    {
        return $this->set('position', $value);
    }

    /**
     * 是否显示图标.
     * @param mixed $value
     */
    public function showIcon($value = true)
    {
        return $this->set('showIcon', $value);
    }

    /**
     * 持续时间.
     * @param mixed $value
     */
    public function timeout($value = '')
    {
        return $this->set('timeout', $value);
    }

    /**
     * 标题.
     * @param mixed $value
     */
    public function title($value = '')
    {
        return $this->set('title', $value);
    }
}
