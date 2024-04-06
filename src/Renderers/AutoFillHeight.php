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
 * AutoFillHeight.
 *
 * @version 6.2.2
 */
class AutoFillHeight extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * @param mixed $value
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * @param mixed $value
     */
    public function maxHeight($value = '')
    {
        return $this->set('maxHeight', $value);
    }
}
