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
 * 不指定类型默认就是文本.
 *
 * @version 6.2.2
 */
class ListBodyField extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 配置点击复制功能.
     * @param mixed $value
     */
    public function copyable($value = true)
    {
        return $this->set('copyable', $value);
    }

    /**
     * 内层组件的CSS类名.
     * @param mixed $value
     */
    public function innerClassName($value = '')
    {
        return $this->set('innerClassName', $value);
    }

    /**
     * 列标题.
     * @param mixed $value
     */
    public function label($value = '')
    {
        return $this->set('label', $value);
    }

    /**
     * label 类名.
     * @param mixed $value
     */
    public function labelClassName($value = '')
    {
        return $this->set('labelClassName', $value);
    }

    /**
     * 绑定字段名.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 配置查看详情功能.
     * @param mixed $value
     */
    public function popOver($value = '')
    {
        return $this->set('popOver', $value);
    }

    /**
     * 配置快速编辑功能.
     * @param mixed $value
     */
    public function quickEdit($value = '')
    {
        return $this->set('quickEdit', $value);
    }
}
