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
 * RowSelectionOptions.
 *
 * @version 6.2.2
 */
class RowSelectionOptions extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 选择类型 选择全部.
     * @param mixed $value
     */
    public function key($value = '')
    {
        return $this->set('key', $value);
    }

    /**
     * 选项显示文本.
     * @param mixed $value
     */
    public function text($value = '')
    {
        return $this->set('text', $value);
    }
}
