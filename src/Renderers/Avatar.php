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
 * Avatar.
 *
 * @version 6.2.2
 */
class Avatar extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'avatar');
        $this->set('crossOrigin', 'anonymous');
    }

    /**
     * 图片无法显示时的替换文字地址
     * @param mixed $value
     */
    public function alt($value = '')
    {
        return $this->set('alt', $value);
    }

    /**
     * 角标.
     * @param mixed $value
     */
    public function badge($value = '')
    {
        return $this->set('badge', $value);
    }

    /**
     * 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 图片CORS属性 可选值: anonymous | use-credentials |.
     * @param mixed $value
     */
    public function crossOrigin($value = '')
    {
        return $this->set('crossOrigin', $value);
    }

    /**
     * 默认头像.
     * @param mixed $value
     */
    public function defaultAvatar($value = '')
    {
        return $this->set('defaultAvatar', $value);
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
     * 图片是否允许拖动.
     * @param mixed $value
     */
    public function draggable($value = true)
    {
        return $this->set('draggable', $value);
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
     * 图片相对于容器的缩放方式 可选值: fill | contain | cover | none | scale-down.
     * @param mixed $value
     */
    public function fit($value = '')
    {
        return $this->set('fit', $value);
    }

    /**
     * 字符类型距离左右两侧边界单位像素.
     * @param mixed $value
     */
    public function gap($value = '')
    {
        return $this->set('gap', $value);
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
     * 图标.
     * @param mixed $value
     */
    public function icon($value = '')
    {
        return $this->set('icon', $value);
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
     * 图片加载失败的是否默认处理，字符串函数.
     * @param mixed $value
     */
    public function onError($value = '')
    {
        return $this->set('onError', $value);
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
     * 形状 可选值: circle | square | rounded.
     * @param mixed $value
     */
    public function shape($value = '')
    {
        return $this->set('shape', $value);
    }

    /**
     * 大小.
     * @param mixed $value
     */
    public function size($value = '')
    {
        return $this->set('size', $value);
    }

    /**
     * 图片地址
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
     * 自定义样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 文本.
     * @param mixed $value
     */
    public function text($value = '')
    {
        return $this->set('text', $value);
    }

    /**
     * @param mixed $value
     */
    public function type($value = 'avatar')
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
}
