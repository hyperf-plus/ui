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
 * ComboCondition.
 *
 * @version 6.2.2
 */
class ComboCondition extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
    }

    /**
     * @param mixed $value
     */
    public function label($value = '')
    {
        return $this->set('label', $value);
    }

    /**
     * @param mixed $value
     */
    public function mode($value = '')
    {
        return $this->set('mode', $value);
    }

    /**
     * @param mixed $value
     */
    public function scaffold($value = '')
    {
        return $this->set('scaffold', $value);
    }

    /**
     * @param mixed $value
     */
    public function test($value = '')
    {
        return $this->set('test', $value);
    }
}
