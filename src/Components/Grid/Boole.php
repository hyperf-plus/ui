<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
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
