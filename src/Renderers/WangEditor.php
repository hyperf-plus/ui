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

use HPlus\UI\Traits\HasUploadTrait;

/**
 * WangEditor.
 *
 * @version 6.2.2
 */
class WangEditor extends BaseRenderer
{
    use HasUploadTrait;

    public function __construct()
    {
        $this->set('type', 'custom-wang-editor');

        $this->uploadImageServer($this->uploadRichPath(true))->uploadVideoServer($this->uploadRichPath(true));
    }

    /**
     * 自动填充.
     * @param mixed $value
     */
    public function autoFill($value = '')
    {
        return $this->set('autoFill', $value);
    }

    /**
     * 自动获取焦点.
     * @param mixed $value
     */
    public function autoFocus($value = true)
    {
        return $this->set('autoFocus', $value);
    }

    /**
     * 设置类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 当前表单项隐藏时是否清除值
     * @param mixed $value
     */
    public function clearValueOnHidden($value = true)
    {
        return $this->set('clearValueOnHidden', $value);
    }

    /**
     * 描述.
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
     * 排除按钮.
     * @param mixed $value
     */
    public function excludeKeys($value = '')
    {
        return $this->set('excludeKeys', $value);
    }

    /**
     * 编辑器高度 px.
     * @param mixed $value
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * 插入按钮.
     * @param mixed $value
     */
    public function insertKeys($value = '')
    {
        return $this->set('insertKeys', $value);
    }

    /**
     * 字段标签.
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
     * 表单项标签描述.
     * @param mixed $value
     */
    public function labelRemark($value = '')
    {
        return $this->set('labelRemark', $value);
    }

    /**
     * 最大长度.
     * @param mixed $value
     */
    public function maxLength($value = '')
    {
        return $this->set('maxLength', $value);
    }

    /**
     * 字段名.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 占位符.
     * @param mixed $value
     */
    public function placeholder($value = '')
    {
        return $this->set('placeholder', $value);
    }

    /**
     * 备注.
     * @param mixed $value
     */
    public function remark($value = '')
    {
        return $this->set('remark', $value);
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
     * 是否必填的条件.
     * @param mixed $value
     */
    public function requiredOn($value = '')
    {
        return $this->set('requiredOn', $value);
    }

    /**
     * 是否静态展示.
     * @param mixed $value
     */
    public function static($value = true)
    {
        return $this->set('static', $value);
    }

    /**
     * 工具栏按钮.
     * @param mixed $value
     */
    public function toolbarKeys($value = '')
    {
        return $this->set('toolbarKeys', $value);
    }

    /**
     * 指定为 wang-editor 渲染器。
     * @param mixed $value
     */
    public function type($value = 'custom-wang-editor')
    {
        return $this->set('type', $value);
    }

    /**
     * 上传图片的最大数量 默认 100.
     * @param mixed $value
     */
    public function uploadImageMaxNumber($value = '')
    {
        return $this->set('uploadImageMaxNumber', $value);
    }

    /**
     * 上传图片的最大大小 单位: K 默认 2M.
     * @param mixed $value
     */
    public function uploadImageMaxSize($value = '')
    {
        return $this->set('uploadImageMaxSize', $value);
    }

    /**
     * 上传图片的服务器地址
     * @param mixed $value
     */
    public function uploadImageServer($value = '')
    {
        return $this->set('uploadImageServer', $value);
    }

    /**
     * 上传视频的最大数量 默认 5.
     * @param mixed $value
     */
    public function uploadVideoMaxNumber($value = '')
    {
        return $this->set('uploadVideoMaxNumber', $value);
    }

    /**
     * 上传视频的最大大小 单位: K 默认 10M.
     * @param mixed $value
     */
    public function uploadVideoMaxSize($value = '')
    {
        return $this->set('uploadVideoMaxSize', $value);
    }

    /**
     * 上传视频的服务器地址
     * @param mixed $value
     */
    public function uploadVideoServer($value = '')
    {
        return $this->set('uploadVideoServer', $value);
    }

    /**
     * 校验接口.
     * @param mixed $value
     */
    public function validateApi($value = '')
    {
        return $this->set('validateApi', $value);
    }

    /**
     * 校验错误信息.
     * @param mixed $value
     */
    public function validationErrors($value = '')
    {
        return $this->set('validationErrors', $value);
    }

    /**
     * 校验规则.
     * @param mixed $value
     */
    public function validations($value = '')
    {
        return $this->set('validations', $value);
    }

    /**
     * 默认值
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
     * 当前表单项是否显示的条件.
     * @param mixed $value
     */
    public function visibleOn($value = '')
    {
        return $this->set('visibleOn', $value);
    }
}
