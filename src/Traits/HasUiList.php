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

trait HasUiList
{
    use HasUiBase;
    /**
     * @return array|mixed
     */
    public function index()
    {
        $content = new Content();
        //可以重写这里，实现自定义布局
        $content->body($this->grid())->className("p-10");
        //这里必须这样写
        return $this->isGetData() ? $this->grid()->jsonSerialize() : $content->jsonSerialize();
    }

}