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
 * IconItem.
 *
 * @version 6.2.2
 */
class IconItem extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * @param mixed $value
     */
    public function icon($value = '')
    {
        return $this->set('icon', $value);
    }

    /**
     * @param mixed $value
     */
    public function position($value = '')
    {
        return $this->set('position', $value);
    }
}
