<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Concerns;

use HPlus\UI\Components\Widgets\Dialog;

trait HasDialog
{
    protected $dialog;

    public function dialog(\Closure $closure)
    {
        $this->dialog = new Dialog();
        call_user_func($closure, $this->dialog);
        return $this;
    }

}
