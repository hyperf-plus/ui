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
 * SvgIcon.
 *
 * @version 6.2.2
 */
class SvgIcon extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'custom-svg-icon');
    }

    /**
     * 设置图标的类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 设置图标的名称.
     * @param mixed $value
     */
    public function icon($value = '')
    {
        return $this->set('icon', $value);
    }

    /**
     * 指定为 custom-svg-icon 渲染器。
     * @param mixed $value
     */
    public function type($value = 'custom-svg-icon')
    {
        return $this->set('type', $value);
    }
}
