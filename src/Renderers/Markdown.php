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
 * Markdown 渲染.
 *
 * @version 6.2.2
 */
class Markdown extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'markdown');
    }

    /**
     * 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 名称.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 外部地址
     * @param mixed $value
     */
    public function src($value = '')
    {
        return $this->set('src', $value);
    }

    /**
     * 指定为 markdown 渲染器。
     * @param mixed $value
     */
    public function type($value = 'markdown')
    {
        return $this->set('type', $value);
    }

    /**
     * 静态值
     * @param mixed $value
     */
    public function value($value = '')
    {
        return $this->set('value', $value);
    }
}
