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
 * Flex 布局
 *
 * @version 6.2.2
 */
class Flex extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'flex');
    }

    /**
     * stretch, start, flex-start, flex-end, end, center, baseline.
     * @param mixed $value
     */
    public function alignItems($value = '')
    {
        return $this->set('alignItems', $value);
    }

    /**
     * css 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 布局方向: column, row.
     * @param mixed $value
     */
    public function direction($value = '')
    {
        return $this->set('direction', $value);
    }

    /**
     * 子元素, 数组表示多个.
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
    }

    /**
     * start, flex-start, center, end, flex-end, space-around, space-between, space-evenly.
     * @param mixed $value
     */
    public function justify($value = '')
    {
        return $this->set('justify', $value);
    }

    /**
     * 自定义样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 指定为 flex 渲染器。
     * @param mixed $value
     */
    public function type($value = 'flex')
    {
        return $this->set('type', $value);
    }
}
