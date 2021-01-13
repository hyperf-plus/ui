<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Facades;

class Facade{
    public function __construct(){
        //
    }

    protected static function getInstance($classname){
        return new $classname();
    }

    protected static function getFacadeAccessor(){
        //
    }

    /**
     * @param $method
     * @param $arg
     */
    public static function __callstatic($method,$arg){
        $instance= static::getInstance(static::getFacadeAccessor());
        return call_user_func_array(array($instance,$method),$arg);
    }
}