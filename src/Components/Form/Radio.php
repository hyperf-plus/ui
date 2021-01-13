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

class Radio extends Component
{
    protected $componentName = "Radio";

    /**
     * @var string
     */
    protected $label;
    protected $disabled = false;
    protected $border = false;
    /**
     * @var string
     */
    protected $size;
    /**
     * 原生 name 属性
     * @var string
     */
    protected $name;

    protected $title;

    static public function make($value, $title)
    {
        return (new Radio($value))->label($value)->title($title);
    }

    /**
     * Radio 的 value
     * @param  $label
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * 是否禁用
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * 是否显示边框
     * @param bool $border
     * @return $this
     */
    public function border(bool $border = true)
    {
        $this->border = $border;
        return $this;
    }

    /**
     * Radio 的尺寸，仅在 border 为真时有效
     * @param string $size
     * @return $this
     */
    public function size(string $size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * 原生 name 属性
     * @param string $name
     * @return $this
     */
    public function name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

}
