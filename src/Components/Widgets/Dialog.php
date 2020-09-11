<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
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
