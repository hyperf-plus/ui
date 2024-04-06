<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HPlus\UI\Renderers;

/**
 * InputDatetimeRange 日期时间范围.
 *
 * @version 6.2.2
 */
class InputDatetimeRange extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'input-datetime-range');
    }

    /**
     * 数据录入配置，自动填充或者参照录入.
     * @param mixed $value
     */
    public function autoFill($value = '')
    {
        return $this->set('autoFill', $value);
    }

    /**
     * 表单最外层类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 是否可清除.
     * @param mixed $value
     */
    public function clearable($value = true)
    {
        return $this->set('clearable', $value);
    }

    /**
     * 表单项描述.
     * @param mixed $value
     */
    public function description($value = '')
    {
        return $this->set('description', $value);
    }

    /**
     * 是否禁用.
     * @param mixed $value
     */
    public function disabled($value = true)
    {
        return $this->set('disabled', $value);
    }

    /**
     * 当前表单项是否禁用的条件.
     * @param mixed $value
     */
    public function disabledOn($value = '')
    {
        return $this->set('disabledOn', $value);
    }

    /**
     * 日期时间选择器值格式.
     * @param mixed $value
     */
    public function format($value = '')
    {
        return $this->set('format', $value);
    }

    /**
     * 是否内联.
     * @param mixed $value
     */
    public function inline($value = true)
    {
        return $this->set('inline', $value);
    }

    /**
     * 表单控制器类名.
     * @param mixed $value
     */
    public function inputClassName($value = '')
    {
        return $this->set('inputClassName', $value);
    }

    /**
     * 日期时间选择器显示格式.
     * @param mixed $value
     */
    public function inputFormat($value = '')
    {
        return $this->set('inputFormat', $value);
    }

    /**
     * 表单项标签.
     * @param mixed $value
     */
    public function label($value = '')
    {
        return $this->set('label', $value);
    }

    /**
     * 表单项标签对齐方式，默认右对齐，仅在 mode为horizontal 时生效.
     * @param mixed $value
     */
    public function labelAlign($value = '')
    {
        return $this->set('labelAlign', $value);
    }

    /**
     * label 的类名.
     * @param mixed $value
     */
    public function labelClassName($value = '')
    {
        return $this->set('labelClassName', $value);
    }

    /**
     * 表单项标签描述.
     * @param mixed $value
     */
    public function labelRemark($value = '')
    {
        return $this->set('labelRemark', $value);
    }

    /**
     * 限制最大日期时间，用法同 限制范围.
     * @param mixed $value
     */
    public function maxDate($value = '')
    {
        return $this->set('maxDate', $value);
    }

    /**
     * 限制最小日期时间，用法同 限制范围.
     * @param mixed $value
     */
    public function minDate($value = '')
    {
        return $this->set('minDate', $value);
    }

    /**
     * 字段名，指定该表单项提交时的 key.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 表单项描述.
     * @param mixed $value
     */
    public function placeholder($value = '')
    {
        return $this->set('placeholder', $value);
    }

    /**
     * 日期范围快捷键.
     * @param mixed $value
     */
    public function ranges($value = '')
    {
        return $this->set('ranges', $value);
    }

    /**
     * 是否必填.
     * @param mixed $value
     */
    public function required($value = true)
    {
        return $this->set('required', $value);
    }

    /**
     * 通过表达式来配置当前表单项是否为必填。
     * @param mixed $value
     */
    public function requiredOn($value = '')
    {
        return $this->set('requiredOn', $value);
    }

    /**
     * 是否该表单项值发生变化时就提交当前表单。
     * @param mixed $value
     */
    public function submitOnChange($value = true)
    {
        return $this->set('submitOnChange', $value);
    }

    /**
     * 指定为 input-datetime-range 渲染器。
     * @param mixed $value
     */
    public function type($value = 'input-datetime-range')
    {
        return $this->set('type', $value);
    }

    /**
     * 保存 UTC 值
     * @param mixed $value
     */
    public function utc($value = true)
    {
        return $this->set('utc', $value);
    }

    /**
     * 表单校验接口.
     * @param mixed $value
     */
    public function validateApi($value = '')
    {
        return $this->set('validateApi', $value);
    }

    /**
     * 表单项值格式验证，支持设置多个，多个规则用英文逗号隔开。
     * @param mixed $value
     */
    public function validations($value = '')
    {
        return $this->set('validations', $value);
    }

    /**
     * 表单默认值
     * @param mixed $value
     */
    public function value($value = '')
    {
        return $this->set('value', $value);
    }

    /**
     * 是否显示.
     * @param mixed $value
     */
    public function visible($value = true)
    {
        return $this->set('visible', $value);
    }

    /**
     * 当前表单项是否禁用的条件.
     * @param mixed $value
     */
    public function visibleOn($value = '')
    {
        return $this->set('visibleOn', $value);
    }
}
