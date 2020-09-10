<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Concerns;

use Mzh\UI\Components\Widgets\Dialog;

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
