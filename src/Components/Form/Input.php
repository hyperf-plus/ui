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

class Input extends Component
{

    protected $componentName = "Input";

    protected $type = "text";
    protected $maxlength;
    protected $minlength;
    protected $showWordLimit = false;
    protected $placeholder;
    protected $clearable = false;
    protected $showPassword = false;
    protected $disabled = false;
    protected $size;
    protected $prefixIcon;
    protected $suffixIcon;
    protected $rows = 2;
    protected $autosize = false;
    protected $autocomplete = "off";
    protected $readonly = false;
    protected $max;
    protected $min;
    protected $step;
    protected $resize;
    protected $autofocus = false;
    protected $form;
    protected $label;
    protected $tabindex;
    protected $validateEvent = true;

    protected $prepend;
    protected $append;


    static public function make($value = "")
    {
        return new Input($value);
    }

    /**
     * @param int $rows
     * @return $this
     */
    public function textarea($rows = 2)
    {
        $this->type = "textarea";
        $this->rows = $rows;
        return $this;
    }

    /**
     * @return $this
     */
    public function password()
    {
        $this->type = "password";
        return $this;
    }

    /**
     * 类型
     * text，textarea 和其他 原生 input 的 type 值
     * @param string $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * 原生属性，最大输入长度
     * @param string $maxlength
     * @return $this
     */
    public function maxlength($maxlength)
    {
        $this->maxlength = $maxlength;
        return $this;
    }

    /**
     * 原生属性，最小输入长度
     * @param string $minlength
     * @return $this
     */
    public function minlength($minlength)
    {
        $this->minlength = $minlength;
        return $this;
    }

    /**
     * 是否显示输入字数统计，只在 type = "text" 或 type = "textarea" 时有效
     * 必须设置maxlength才会生效
     * @param bool $showWordLimit
     * @return $this
     */
    public function showWordLimit(bool $showWordLimit = true)
    {
        $this->showWordLimit = $showWordLimit;
        return $this;
    }

    /**
     * 输入框占位文本
     * @param string $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
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
     * 是否显示切换密码图标
     * @param bool $showPassword
     * @return $this
     */
    public function showPassword(bool $showPassword = true)
    {
        $this->showPassword = $showPassword;
        return $this;
    }

    /**
     * 禁用
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled = true)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * 输入框尺寸，只在 type!="textarea" 时有效
     * medium / small / mini
     * @param string $size
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * 输入框头部图标
     * @param string $prefixIcon
     * @return $this
     */
    public function prefixIcon($prefixIcon)
    {
        $this->prefixIcon = $prefixIcon;
        return $this;
    }

    /**
     * 输入框尾部图标
     * @param string $suffixIcon
     * @return $this
     */
    public function suffixIcon($suffixIcon)
    {
        $this->suffixIcon = $suffixIcon;
        return $this;
    }

    /**
     * 输入框行数，只对 type="textarea" 有效
     * @param int $rows
     * @return $this
     */
    public function rows(int $rows)
    {
        $this->rows = $rows;
        return $this;
    }

    /**
     * 自适应内容高度，只对 type="textarea" 有效，可传入对象，如，{ minRows: 2, maxRows: 6 }
     * @param bool $autosize
     * @return $this
     */
    public function autosize(bool $autosize)
    {
        $this->autosize = $autosize;
        return $this;
    }

    /**
     * 原生属性，自动补全
     * @param string $autocomplete
     * @return $this
     */
    public function autocomplete(string $autocomplete)
    {
        $this->autocomplete = $autocomplete;
        return $this;
    }

    /**
     * 原生属性，是否只读
     * @param bool $readonly
     * @return $this
     */
    public function readonly(bool $readonly = true)
    {
        $this->readonly = $readonly;
        return $this;
    }

    /**
     * 原生属性，设置最大值
     * @param string $max
     * @return $this
     */
    public function max($max)
    {
        $this->max = $max;
        return $this;
    }

    /**
     * 原生属性，设置最小值
     * @param string $min
     * @return $this
     */
    public function min($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * 原生属性，设置输入字段的合法数字间隔
     * @param string $step
     * @return $this
     */
    public function step($step)
    {
        $this->step = $step;
        return $this;
    }

    /**
     * 控制是否能被用户缩放
     * @param string $resize
     * @return $this
     */
    public function resize($resize)
    {
        $this->resize = $resize;
        return $this;
    }

    /**
     * 原生属性，自动获取焦点
     * @param bool $autofocus
     * @return $this
     */
    public function autofocus(bool $autofocus = true)
    {
        $this->autofocus = $autofocus;
        return $this;
    }

    /**
     * 原生属性
     * @param string $form
     * @return $this
     */
    public function form($form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * 输入框关联的label文字
     * @param string $label
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * 输入框的tabindex
     * @param string $tabindex
     * @return $this
     */
    public function tabindex($tabindex)
    {
        $this->tabindex = $tabindex;
        return $this;
    }

    /**
     * 输入时是否触发表单的校验
     * @param bool $validateEvent
     * @return $this
     */
    public function validateEvent(bool $validateEvent = true)
    {
        $this->validateEvent = $validateEvent;
        return $this;
    }

    /**
     * 输入框前置内容
     * @param mixed $prepend
     * @return $this
     */
    public function prepend($prepend)
    {
        $this->prepend = $prepend;
        return $this;
    }

    /**
     * 输入框后置内容
     * @param mixed $append
     * @return $this
     */
    public function append($append)
    {
        $this->append = $append;
        return $this;
    }


}
