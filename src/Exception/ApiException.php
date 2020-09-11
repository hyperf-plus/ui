<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Exception;

use Hyperf\Server\Exception\ServerException;
use Throwable;

class ApiException extends ServerException
{
    public function __construct(string $message = null, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
