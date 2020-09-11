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


use Mzh\UI\Components\Attrs\Button;
use Mzh\UI\Components\Component;

class DialogButton extends Component
{

    use Button;

    protected $componentName = 'DialogButton';


    public static function make()
    {
        return new DialogButton();
    }

}
