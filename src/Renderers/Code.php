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
 * Code 代码高亮.
 *
 * @version 6.2.2
 */
class Code extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'code');
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
     * 主题，还有 'vs-dark'.
     * @param mixed $value
     */
    public function editorTheme($value = '')
    {
        return $this->set('editorTheme', $value);
    }

    /**
     * 所使用的高亮语言，默认是 plaintext.
     * @param mixed $value
     */
    public function language($value = '')
    {
        return $this->set('language', $value);
    }

    /**
     * 在其他组件中，时，用作变量映射.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 默认 tab 大小.
     * @param mixed $value
     */
    public function tabSize($value = '')
    {
        return $this->set('tabSize', $value);
    }

    /**
     * 指定为 code 渲染器。
     * @param mixed $value
     */
    public function type($value = 'code')
    {
        return $this->set('type', $value);
    }

    /**
     * 显示的颜色值
     * @param mixed $value
     */
    public function value($value = '')
    {
        return $this->set('value', $value);
    }

    /**
     * 是否折行.
     * @param mixed $value
     */
    public function wordWrap($value = true)
    {
        return $this->set('wordWrap', $value);
    }
}
