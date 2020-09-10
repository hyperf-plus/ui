<?php
declare(strict_types=1);
namespace Mzh\UI\Components\Grid;


use Mzh\UI\Components\GridComponent;

class Icon extends GridComponent
{
    protected $componentName = "Icon";

    static public function make($value = null)
    {
        return new Icon($value);
    }

}
