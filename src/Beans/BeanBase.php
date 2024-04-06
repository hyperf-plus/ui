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

namespace HPlus\UI\Beans;

use ArrayObject;

abstract class BeanBase extends ArrayObject
{
    public function toArray()
    {
        return ArrayObject::getArrayCopy();
    }
}
