<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace Mzh\UI\Actions;


use Mzh\UI\Components\Attrs\Button;

class BaseRowAction extends BaseAction
{
    use Button;


    protected $order = 1;




    protected $vif;


    /**
     * 设置排序越大越靠前
     * @param int $order
     * @return $this
     */
    public function order(int $order)
    {
        $this->order = $order;
        return $this;
    }







    /**
     * 设置操作vif属性算法
     * @param array $vif
     * @return $this
     */
    public function vif($vif)
    {
        $this->vif = $vif;
        return $this;
    }


}
