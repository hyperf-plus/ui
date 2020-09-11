<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Actions;


use HPlus\UI\Actions\BaseRowAction;

class VueRouteAction extends BaseRowAction
{

    protected $componentName = "VueRouteAction";
    protected $name = "操作";

    protected $path;

    protected $httpPath;

    public static function make()
    {
        return new VueRouteAction();
    }

    /**
     * @param string $name
     * @return $this
     */
    public function name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $path
     * @return $this
     */
    public function path($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @param mixed $httpPath
     * @return $this
     */
    public function httpPath($httpPath)
    {
        $this->httpPath = $httpPath;
        return $this;
    }


}
