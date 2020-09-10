<?php
declare(strict_types=1);


namespace Mzh\UI\Components\Attrs;


class CascaderProps
{
    public $expandTrigger = 'click';
    public $multiple = false;
    public $checkStrictly = false;
    public $emitPath = true;
    public $lazy = false;
    public $lazyUrl;
    public $value = 'value';
    public $label = 'label';
    public $children = 'children';
    public $leaf = 'leaf';
}
