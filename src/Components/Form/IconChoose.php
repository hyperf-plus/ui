<?php
declare(strict_types=1);
namespace Mzh\UI\Components\Form;

use Mzh\UI\Components\Component;

class IconChoose extends Component
{
    protected $componentName = "IconChoose";

    public static function make($value = null)
    {
        return new IconChoose($value);
    }

}
