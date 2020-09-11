<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace Mzh\UI\Traits;

use Mzh\UI\Layout\Content;
use Mzh\Swagger\Annotation\GetApi;
use Mzh\Swagger\Annotation\Path;
use Mzh\Swagger\Annotation\PostApi;
use Mzh\Swagger\Annotation\PutApi;

trait HasUiAdd
{
    use HasUiBase;

    /**
     * 获取创建UI配置
     * @return array|mixed
     */
    public function create()
    {
        if ($this->isGet()){
            return $this->form(true)->store();
        }
        $content = new Content;
        //可以重写这里，实现自定义布局
        $content->body($this->form())->className("m-10");
        //这里必须这样写
        return $content;
    }
}