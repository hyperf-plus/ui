<?php
declare(strict_types=1);
namespace Mzh\UI\Components\Grid;


use Mzh\UI\Components\GridComponent;

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
