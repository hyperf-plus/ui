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
 * Log 实时日志.
 *
 * @version 6.2.2
 */
class Log extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'log');
    }

    /**
     * 是否自动滚动到底部.
     * @param mixed $value
     */
    public function autoScroll($value = '')
    {
        return $this->set('autoScroll', $value);
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
     * 关闭 ANSI 颜色支持
     * @param mixed $value
     */
    public function disableColor($value = '')
    {
        return $this->set('disableColor', $value);
    }

    /**
     * 返回内容的字符编码
     * @param mixed $value
     */
    public function encoding($value = '')
    {
        return $this->set('encoding', $value);
    }

    /**
     * 展示区域高度.
     * @param mixed $value
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * 最大显示行数.
     * @param mixed $value
     */
    public function maxLength($value = '')
    {
        return $this->set('maxLength', $value);
    }

    /**
     * 可选日志操作：['stop', 'clear', 'showLineNumber', 'filter'].
     * @param mixed $value
     */
    public function operation($value = '')
    {
        return $this->set('operation', $value);
    }

    /**
     * 加载中的文字.
     * @param mixed $value
     */
    public function placeholder($value = '')
    {
        return $this->set('placeholder', $value);
    }

    /**
     * 设置每行高度，将会开启虚拟渲染.
     * @param mixed $value
     */
    public function rowHeight($value = '')
    {
        return $this->set('rowHeight', $value);
    }

    /**
     * 接口.
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
    }

    /**
     * 指定为 log 渲染器。
     * @param mixed $value
     */
    public function type($value = 'log')
    {
        return $this->set('type', $value);
    }
}
