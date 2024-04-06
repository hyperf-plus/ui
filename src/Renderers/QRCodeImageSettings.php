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
 * QRCodeImageSettings.
 *
 * @version 6.2.2
 */
class QRCodeImageSettings extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * @param mixed $value
     */
    public function excavate($value = true)
    {
        return $this->set('excavate', $value);
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
    public function src($value = '')
    {
        return $this->set('src', $value);
    }

    /**
     * @param mixed $value
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }

    /**
     * @param mixed $value
     */
    public function x($value = '')
    {
        return $this->set('x', $value);
    }

    /**
     * @param mixed $value
     */
    public function y($value = '')
    {
        return $this->set('y', $value);
    }
}
