<?php
declare(strict_types=1);
namespace Mzh\UI\Components\Widgets;


use Mzh\UI\Components\Attrs\ElDialog;
use Mzh\UI\Components\Component;

class Dialog extends Component
{
    use ElDialog;

    protected $componentName = "Dialog";


    public static function make()
    {
        return new Dialog();
    }

}
