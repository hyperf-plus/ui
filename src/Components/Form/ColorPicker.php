<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Components\Form;


use Mzh\UI\Components\Component;

class ColorPicker extends Component
{
    protected $componentName = "ColorPicker";
    protected $disabled = false;
    /**
     * @var string
     */
    protected $size;
    protected $showAlpha = false;
    /**
     * @var string
     */
    protected $colorFormat;
    /**
     * @var string
     */
    protected $popperClass;
    protected $predefine = [];

    static public function make($value = null)
    {
        return new ColorPicker($value);
    }

    /**
     * 是否禁用
     * @param bool $disabled
     * @return $this
     */
    public function disabled($disabled = true)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * 尺寸 medium / small / mini
     * @param string $size
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * 是否支持透明度选择
     * @param bool $showAlpha
     * @return $this
     */
    public function showAlpha($showAlpha = true)
    {
        $this->showAlpha = $showAlpha;
        return $this;
    }

    /**
     * 写入 v-model 的颜色的格式
     * hsl / hsv / hex / rgb
     * @param string $colorFormat
     * @return $this
     */
    public function colorFormat($colorFormat)
    {
        $this->colorFormat = $colorFormat;
        return $this;
    }

    /**
     * ColorPicker 下拉框的类名
     * @param string $popperClass
     * @return $this
     */
    public function popperClass($popperClass)
    {
        $this->popperClass = $popperClass;
        return $this;
    }

    /**
     * 预定义颜色
     * @param array $predefine
     * @return $this
     */
    public function predefine($predefine)
    {
        $this->predefine = $predefine;
        return $this;
    }


}
