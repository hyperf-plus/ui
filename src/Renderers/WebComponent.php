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
 * Web Component.
 *
 * @version 6.2.2
 */
class WebComponent extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'web-component');
    }

    /**
     * 子节点.
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * 标签上的属性.
     * @param mixed $value
     */
    public function props($value = '')
    {
        return $this->set('props', $value);
    }

    /**
     * 具体使用的 web-component 标签.
     * @param mixed $value
     */
    public function tag($value = '')
    {
        return $this->set('tag', $value);
    }

    /**
     * 指定为 web-component 渲染器。
     * @param mixed $value
     */
    public function type($value = 'web-component')
    {
        return $this->set('type', $value);
    }
}
