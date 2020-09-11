<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
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
