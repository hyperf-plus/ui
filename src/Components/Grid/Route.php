<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
 namespace HPlus\UI\Components\Grid;


use HPlus\UI\Components\GridComponent;

class Route extends GridComponent
{
    protected $componentName = "GridRoute";

    protected $uri;

    protected $type;
    protected $icon;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }


    public static function make($url = "")
    {
        return new Route($url);
    }

    /**
     * 类型
     * primary / success / warning / danger / info
     * @param mixed $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 图标类名
     * @param mixed $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }




}
