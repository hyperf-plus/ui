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
 * 图片展示控件。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/image.
 *
 * @version 6.2.2
 */
class Image extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'image');
    }

    /**
     * 图片无法显示时的替换文本.
     * @param mixed $value
     */
    public function alt($value = '')
    {
        return $this->set('alt', $value);
    }

    /**
     * 是否新窗口打开
     * @param mixed $value
     */
    public function blank($value = true)
    {
        return $this->set('blank', $value);
    }

    /**
     * 图片说明文字.
     * @param mixed $value
     */
    public function caption($value = '')
    {
        return $this->set('caption', $value);
    }

    /**
     * 外层 css 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 默认图片地址
     * @param mixed $value
     */
    public function defaultImage($value = '')
    {
        return $this->set('defaultImage', $value);
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
     * 是否禁用表达式.
     * @param mixed $value
     */
    public function disabledOn($value = '')
    {
        return $this->set('disabledOn', $value);
    }

    /**
     * 编辑器配置，运行时可以忽略.
     * @param mixed $value
     */
    public function editorSetting($value = '')
    {
        return $this->set('editorSetting', $value);
    }

    /**
     * 是否启动放大功能。
     * @param mixed $value
     */
    public function enlargeAble($value = true)
    {
        return $this->set('enlargeAble', $value);
    }

    /**
     * 放大时是否显示图片集.
     * @param mixed $value
     */
    public function enlargeWithGallary($value = true)
    {
        return $this->set('enlargeWithGallary', $value);
    }

    /**
     * 高度.
     * @param mixed $value
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * 是否隐藏.
     * @param mixed $value
     */
    public function hidden($value = true)
    {
        return $this->set('hidden', $value);
    }

    /**
     * 是否隐藏表达式.
     * @param mixed $value
     */
    public function hiddenOn($value = '')
    {
        return $this->set('hiddenOn', $value);
    }

    /**
     * 链接地址
     * @param mixed $value
     */
    public function href($value = '')
    {
        return $this->set('href', $value);
    }

    /**
     * 链接的 target.
     * @param mixed $value
     */
    public function htmlTarget($value = '')
    {
        return $this->set('htmlTarget', $value);
    }

    /**
     * 组件唯一 id，主要用于日志采集.
     * @param mixed $value
     */
    public function id($value = '')
    {
        return $this->set('id', $value);
    }

    /**
     * 图片描述信息.
     * @param mixed $value
     */
    public function imageCaption($value = '')
    {
        return $this->set('imageCaption', $value);
    }

    /**
     * 图片 css 类名.
     * @param mixed $value
     */
    public function imageClassName($value = '')
    {
        return $this->set('imageClassName', $value);
    }

    /**
     * 放大详情图 CSS 类名.
     * @param mixed $value
     */
    public function imageGallaryClassName($value = '')
    {
        return $this->set('imageGallaryClassName', $value);
    }

    /**
     * 图片展示模式，默认为缩略图模式、可以配置成原图模式 可选值: thumb | original.
     * @param mixed $value
     */
    public function imageMode($value = '')
    {
        return $this->set('imageMode', $value);
    }

    /**
     * 组件内层 css 类名.
     * @param mixed $value
     */
    public function innerClassName($value = '')
    {
        return $this->set('innerClassName', $value);
    }

    /**
     * 关联字段名，也可以直接配置 src.
     * @param mixed $value
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 事件动作配置.
     * @param mixed $value
     */
    public function onEvent($value = '')
    {
        return $this->set('onEvent', $value);
    }

    /**
     * 大图地址，不设置用 src.
     * @param mixed $value
     */
    public function originalSrc($value = '')
    {
        return $this->set('originalSrc', $value);
    }

    /**
     * 是否展示图片工具栏.
     * @param mixed $value
     */
    public function showToolbar($value = true)
    {
        return $this->set('showToolbar', $value);
    }

    /**
     * 图片地址，如果配置了 name，这个属性不用配置。
     * @param mixed $value
     */
    public function src($value = '')
    {
        return $this->set('src', $value);
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
     * 静态展示表单项类名.
     * @param mixed $value
     */
    public function staticClassName($value = '')
    {
        return $this->set('staticClassName', $value);
    }

    /**
     * 静态展示表单项Value类名.
     * @param mixed $value
     */
    public function staticInputClassName($value = '')
    {
        return $this->set('staticInputClassName', $value);
    }

    /**
     * 静态展示表单项Label类名.
     * @param mixed $value
     */
    public function staticLabelClassName($value = '')
    {
        return $this->set('staticLabelClassName', $value);
    }

    /**
     * 是否静态展示表达式.
     * @param mixed $value
     */
    public function staticOn($value = '')
    {
        return $this->set('staticOn', $value);
    }

    /**
     * 静态展示空值占位.
     * @param mixed $value
     */
    public function staticPlaceholder($value = '')
    {
        return $this->set('staticPlaceholder', $value);
    }

    /**
     * @param mixed $value
     */
    public function staticSchema($value = '')
    {
        return $this->set('staticSchema', $value);
    }

    /**
     * 组件样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 图片缩略图外层 css 类名.
     * @param mixed $value
     */
    public function thumbClassName($value = '')
    {
        return $this->set('thumbClassName', $value);
    }

    /**
     * 预览图模式 可选值: w-full | h-full | contain | cover.
     * @param mixed $value
     */
    public function thumbMode($value = '')
    {
        return $this->set('thumbMode', $value);
    }

    /**
     * 预览图比率 可选值: 1:1 | 4:3 | 16:9.
     * @param mixed $value
     */
    public function thumbRatio($value = '')
    {
        return $this->set('thumbRatio', $value);
    }

    /**
     * 图片标题.
     * @param mixed $value
     */
    public function title($value = '')
    {
        return $this->set('title', $value);
    }

    /**
     * 工具栏配置.
     * @param mixed $value
     */
    public function toolbarActions($value = '')
    {
        return $this->set('toolbarActions', $value);
    }

    /**
     * 指定为图片展示类型 可选值: image | static-image.
     * @param mixed $value
     */
    public function type($value = '')
    {
        return $this->set('type', $value);
    }

    /**
     * 可以组件级别用来关闭移动端样式.
     * @param mixed $value
     */
    public function useMobileUI($value = true)
    {
        return $this->set('useMobileUI', $value);
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
     * 是否显示表达式.
     * @param mixed $value
     */
    public function visibleOn($value = '')
    {
        return $this->set('visibleOn', $value);
    }

    /**
     * 宽度.
     * @param mixed $value
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }
}
