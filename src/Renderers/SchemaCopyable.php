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
 * SchemaCopyable.
 *
 * @version 6.2.2
 */
class SchemaCopyable extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 配置复制时的内容模板。
     * @param mixed $value
     */
    public function content($value = '')
    {
        return $this->set('content', $value);
    }

    /**
     * 可以配置图标.
     * @param mixed $value
     */
    public function icon($value = '')
    {
        return $this->set('icon', $value);
    }

    /**
     * 提示文字内容.
     * @param mixed $value
     */
    public function tooltip($value = '')
    {
        return $this->set('tooltip', $value);
    }
}
