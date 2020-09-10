<?php
declare(strict_types=1);

namespace Mzh\UI\Components\Form;
use Mzh\UI\Components\Component;

class ItemSelect extends Component
{
    protected $componentName = "ItemSelect";

    public static function make()
    {
        return new ItemSelect();
    }

}
