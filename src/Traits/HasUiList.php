<?php


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