<?php

namespace HPlus\UI\Renderers;

/**
 * Barcode 条形码 https://aisuda.bce.baidu.com/amis/zh-CN/components/barcode
 *
 * @author  slowlyo
 * @version 6.2.2
 */
class Barcode extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'barcode');
    }

    /**
     * 外层类名
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 指定为 barcode 渲染器。
     */
    public function type($value = 'barcode')
    {
        return $this->set('type', $value);
    }


}
