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
 * Container 容器渲染器。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/container.
 *
 * @version 6.2.2
 */
class Container extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'container');
    }

    /**
     * 内容.
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * body 类名.
     * @param mixed $value
     */
    public function bodyClassName($value = '')
    {
        return $this->set('bodyClassName', $value);
    }

    /**
     * 容器 css 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
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
     * 是否开启容器拖拽.
     * @param mixed $value
     */
    public function draggable($value = true)
    {
        return $this->set('draggable', $value);
    }

    /**
     * 是否开启容器拖拽配置.
     * @param mixed $value
     */
    public function draggableConfig($value = '')
    {
        return $this->set('draggableConfig', $value);
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
     * 组件唯一 id，主要用于日志采集.
     * @param mixed $value
     */
    public function id($value = '')
    {
        return $this->set('id', $value);
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
     * 指定为 container 类型.
     * @param mixed $value
     */
    public function type($value = 'container')
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
     * 是否需要对body加一层div包裹，默认为 true.
     * @param mixed $value
     */
    public function wrapperBody($value = true)
    {
        return $this->set('wrapperBody', $value);
    }

    /**
     * 使用的标签.
     * @param mixed $value
     */
    public function wrapperComponent($value = '')
    {
        return $this->set('wrapperComponent', $value);
    }
}
