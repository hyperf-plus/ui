<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Facades;

use Mzh\UI\Form;
use Mzh\UI\Grid;
use Mzh\UI\Layout\Content;
use Mzh\UI\Tree;

/**
 * Class Admin.
 *
 * @method static Grid grid($model, \Closure $callable)
 * @method static Form form($model, \Closure $callable)
 * @method static Tree tree($model, \Closure $callable = null)
 * @method static Content content(\Closure $callable = null)
 * @method static string title()
 * @method static void route()
 *
 * @see \Mzh\UI\UI
 */
class UI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Mzh\UI\UI::class;
    }
}
