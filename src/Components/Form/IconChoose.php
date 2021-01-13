<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Components\Form;

use HPlus\UI\Components\Component;
use HPlus\UI\Components\Widgets\Tooltip;

class IconChoose extends Component
{
    protected $componentName = "IconChoose";
    protected $clearable = true;
    protected $userInput = true;
    protected $autoClose = true;
    protected $disabled = false;
    protected $placement = "right";
    protected $placeholder = "请点击右侧选择图标";


    public static function make($value = null)
    {
        return new IconChoose($value);
    }

    /**
     * @param string $placement
     * @return $this
     */
    public function placement(string $placement)
    {
        $this->placement = $placement;
        return $this;
    }

    /**
     * 是否可清空
     * @param bool $clearable
     * @return $this
     */
    public function clearable(bool $clearable = true)
    {
        $this->clearable = $clearable;
        return $this;
    }

    /**
     * 是否用户可输入
     * @param bool $userInput
     * @return $this
     */
    public function userInput(bool $userInput = true)
    {
        $this->userInput = $userInput;
        return $this;
    }

    /**
     * 选择后关闭
     * @param bool $autoClose
     * @return $this
     */
    public function autoClose(bool $autoClose = true)
    {
        $this->autoClose = $autoClose;
        return $this;
    }

    /**
     * 占位符
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder = '')
    {
        $this->placeholder = $placeholder;
        return $this;
    }
    /**
     * 是否禁用
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled = true)
    {
        $this->disabled = $disabled;
        return $this;
    }
}
