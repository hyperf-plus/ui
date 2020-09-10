<?php
declare(strict_types=1);
namespace Mzh\UI\Components\Grid;


use Mzh\UI\Components\Component;

class Boole extends Component
{
    protected $componentName = "Boole";


    public static function make($value = null)
    {
        return new Boole($value);
    }

}
