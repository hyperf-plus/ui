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
 * InputKV 键值对.
 *
 * @version 6.2.2
 */
class InputKV extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'input-kv');
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
     * 默认值
     * @param mixed $value
     */
    public function defaultValue($value = '')
    {
        return $this->set('defaultValue', $value);
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
     * 是否可以拖拽排序.
     * @param mixed $value
     */
    public function draggable($value = true)
    {
        return $this->set('draggable', $value);
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
     * key 的提示信息的.
     * @param mixed $value
     */
    public function keyPlaceholder($value = '')
    {
        return $this->set('keyPlaceholder', $value);
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
     * 指定为 input-kv 渲染器。
     * @param mixed $value
     */
    public function type($value = 'input-kv')
    {
        return $this->set('type', $value);
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
     * value 的提示信息的.
     * @param mixed $value
     */
    public function valuePlaceholder($value = '')
    {
        return $this->set('valuePlaceholder', $value);
    }

    /**
     * 值类型.
     * @param mixed $value
     */
    public function valueType($value = '')
    {
        return $this->set('valueType', $value);
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
