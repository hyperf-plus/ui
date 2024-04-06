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
 * ListenerAction.
 *
 * @version 6.2.2
 */
class ListenerAction extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * @param mixed $value
     */
    public function actionType($value = '')
    {
        return $this->set('actionType', $value);
    }

    /**
     * @param mixed $value
     */
    public function args($value = '')
    {
        return $this->set('args', $value);
    }

    /**
     * @param mixed $value
     */
    public function componentId($value = '')
    {
        return $this->set('componentId', $value);
    }

    /**
     * @param mixed $value
     */
    public function componentName($value = '')
    {
        return $this->set('componentName', $value);
    }

    /**
     * @param mixed $value
     */
    public function data($value = '')
    {
        return $this->set('data', $value);
    }

    /**
     *  可选值: merge | override.
     * @param mixed $value
     */
    public function dataMergeMode($value = '')
    {
        return $this->set('dataMergeMode', $value);
    }

    /**
     * @param mixed $value
     */
    public function description($value = '')
    {
        return $this->set('description', $value);
    }

    /**
     * @param mixed $value
     */
    public function execOn($value = '')
    {
        return $this->set('execOn', $value);
    }

    /**
     * @param mixed $value
     */
    public function expression($value = '')
    {
        return $this->set('expression', $value);
    }

    /**
     * @param mixed $value
     */
    public function ignoreError($value = true)
    {
        return $this->set('ignoreError', $value);
    }

    /**
     * @param mixed $value
     */
    public function outputVar($value = '')
    {
        return $this->set('outputVar', $value);
    }

    /**
     * @param mixed $value
     */
    public function preventDefault($value = true)
    {
        return $this->set('preventDefault', $value);
    }

    /**
     * @param mixed $value
     */
    public function stopPropagation($value = true)
    {
        return $this->set('stopPropagation', $value);
    }
}
