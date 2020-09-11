<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Attrs;


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
