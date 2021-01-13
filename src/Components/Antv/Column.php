<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Components\Antv;

class Column extends Line
{
    protected $componentName = "AntvColumn";
    protected $canvasId;
    protected $data;
    protected $config;


    public static function make()
    {
        return new Column();
    }


}
