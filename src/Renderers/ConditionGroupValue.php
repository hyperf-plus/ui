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
 * ConditionGroupValue.
 *
 * @version 6.2.2
 */
class ConditionGroupValue extends BaseRenderer
{
    public function __construct()
    {
        $this->set('conjunction', 'and');
    }

    /**
     * @param mixed $value
     */
    public function children($value = '')
    {
        return $this->set('children', $value);
    }

    /**
     *  可选值: and | or.
     * @param mixed $value
     */
    public function conjunction($value = '')
    {
        return $this->set('conjunction', $value);
    }

    /**
     * @param mixed $value
     */
    public function id($value = '')
    {
        return $this->set('id', $value);
    }

    /**
     * @param mixed $value
     */
    public function if($value = '')
    {
        return $this->set('if', $value);
    }

    /**
     * @param mixed $value
     */
    public function not($value = true)
    {
        return $this->set('not', $value);
    }
}
