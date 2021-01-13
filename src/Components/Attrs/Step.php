<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Components\Attrs;
use HPlus\UI\Traits\AdminJsonBuilder;
class Step extends AdminJsonBuilder
{

    protected $title;
    protected $description;
    protected $icon;
    protected $status;

    public static function make()
    {
        return new Step();
    }

    /**
     * 标题
     * @param mixed $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * 描述性文字
     * @param string $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * 图标
     * @param string $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * 设置当前步骤的状态，不设置则根据 steps 确定状态
     * @param mixed $status
     * @return $this
     */
    public function status($status)
    {
        $this->status = $status;
        return $this;
    }


}
