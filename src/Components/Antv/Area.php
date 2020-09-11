<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Components\Antv;

use Illuminate\Support\Str;
use Mzh\UI\Components\Component;

class Area extends Line
{
    protected $componentName = "AntvArea";
    protected $canvasId;
    protected $data;
    protected $config;


    public static function make()
    {
        return new Area();
    }


}
