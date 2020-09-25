<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace HPlus\UI\Exception;

use Throwable;

class ValidateException extends \Exception
{
    public function __construct(int $code = 0, string $message = null, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
