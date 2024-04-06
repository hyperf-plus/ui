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
 * Spinner.
 *
 * @version 6.2.2
 */
class Spinner extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'spinner');
    }

    /**
     * 作为容器使用时内容.
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * 自定义spinner的class.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 延迟显示.
     * @param mixed $value
     */
    public function delay($value = '')
    {
        return $this->set('delay', $value);
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
     * 自定义icon.
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
     * @param mixed $value
     */
    public function loadingConfig($value = '')
    {
        return $this->set('loadingConfig', $value);
    }

    /**
     * @param mixed $value
     */
    public function mode($value = '')
    {
        return $this->set('mode', $value);
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
     * 是否显示遮罩层
     * @param mixed $value
     */
    public function overlay($value = true)
    {
        return $this->set('overlay', $value);
    }

    /**
     * 控制Spinner显示与隐藏.
     * @param mixed $value
     */
    public function show($value = true)
    {
        return $this->set('show', $value);
    }

    /**
     * spinner Icon 大小 可选值: sm | lg |.
     * @param mixed $value
     */
    public function size($value = '')
    {
        return $this->set('size', $value);
    }

    /**
     * spin图标位置包裹元素的自定义class.
     * @param mixed $value
     */
    public function spinnerClassName($value = '')
    {
        return $this->set('spinnerClassName', $value);
    }

    /**
     * 作为容器使用时最外层元素的class.
     * @param mixed $value
     */
    public function spinnerWrapClassName($value = '')
    {
        return $this->set('spinnerWrapClassName', $value);
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
     * spinner文案.
     * @param mixed $value
     */
    public function tip($value = '')
    {
        return $this->set('tip', $value);
    }

    /**
     * spinner文案位置 可选值: top | right | bottom | left.
     * @param mixed $value
     */
    public function tipPlacement($value = '')
    {
        return $this->set('tipPlacement', $value);
    }

    /**
     * 组件类型.
     * @param mixed $value
     */
    public function type($value = 'spinner')
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
