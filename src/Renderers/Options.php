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
 * Options 选择器表单项.
 *
 * @version 6.2.2
 */
class Options extends BaseRenderer
{
    public function __construct()
    {
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
     * 是否把选中的值从数组中提取出来，只有当 joinValues 为 true 时生效.
     * @param mixed $value
     */
    public function extractValue($value = true)
    {
        return $this->set('extractValue', $value);
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
     * 每个选项的高度，用于虚拟渲染.
     * @param mixed $value
     */
    public function itemHeight($value = '')
    {
        return $this->set('itemHeight', $value);
    }

    /**
     * 多选时，是否把选中的值用逗号拼接成字符串.
     * @param mixed $value
     */
    public function joinValues($value = true)
    {
        return $this->set('joinValues', $value);
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
     * 标识选项中哪个字段是label值
     * @param mixed $value
     */
    public function labelField($value = '')
    {
        return $this->set('labelField', $value);
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
     * 是否支持多选.
     * @param mixed $value
     */
    public function multiple($value = true)
    {
        return $this->set('multiple', $value);
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
     * 选项组，供用户选择.
     * @param mixed $value
     */
    public function options($value = '')
    {
        return $this->set('options', $value);
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
     * 选项组源，可通过数据映射获取当前数据域变量、或者配置 API 对象
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
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
     * 标识选项中哪个字段是value值
     * @param mixed $value
     */
    public function valueField($value = '')
    {
        return $this->set('valueField', $value);
    }

    /**
     * 默认情况下多选所有选项都会显示，通过这个可以最多显示一行，超出的部分变成 ...
     * @param mixed $value
     */
    public function valuesNoWrap($value = true)
    {
        return $this->set('valuesNoWrap', $value);
    }

    /**
     * 在选项数量超过多少时开启虚拟渲染.
     * @param mixed $value
     */
    public function virtualThreshold($value = '')
    {
        return $this->set('virtualThreshold', $value);
    }

    /**
     * 是否可见
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
