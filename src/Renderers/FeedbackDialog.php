<?php

namespace HPlus\UI\Renderers;

/**
 * FeedbackDialog
 *
 * @author  slowlyo
 * @version 6.2.2
 */
class FeedbackDialog extends BaseRenderer
{
    public function __construct()
    {


    }

    /**
     * 默认不用填写，自动会创建确认和取消按钮。
     */
    public function actions($value = '')
    {
        return $this->set('actions', $value);
    }

    /**
     * 内容区域
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * 配置 Body 容器 className
     */
    public function bodyClassName($value = '')
    {
        return $this->set('bodyClassName', $value);
    }

    /**
     * 容器 css 类名
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 是否支持按 ESC 关闭 Dialog
     */
    public function closeOnEsc($value = true)
    {
        return $this->set('closeOnEsc', $value);
    }

    /**
     * 是否支持点其它区域关闭 Dialog
     */
    public function closeOnOutside($value = true)
    {
        return $this->set('closeOnOutside', $value);
    }

    /**
     * 影响自动生成的按钮，如果自己配置了按钮这个配置无效。
     */
    public function confirm($value = true)
    {
        return $this->set('confirm', $value);
    }

    /**
     * 弹框类型 confirm 确认弹框
     */
    public function dialogType($value = 'confirm')
    {
        return $this->set('dialogType', $value);
    }

    /**
     * 是否禁用
     */
    public function disabled($value = true)
    {
        return $this->set('disabled', $value);
    }

    /**
     * 是否禁用表达式
     */
    public function disabledOn($value = '')
    {
        return $this->set('disabledOn', $value);
    }

    /**
     * 可拖拽
     */
    public function draggable($value = true)
    {
        return $this->set('draggable', $value);
    }

    /**
     * 编辑器配置，运行时可以忽略
     */
    public function editorSetting($value = '')
    {
        return $this->set('editorSetting', $value);
    }

    /**
     *
     */
    public function footer($value = '')
    {
        return $this->set('footer', $value);
    }

    /**
     *
     */
    public function header($value = '')
    {
        return $this->set('header', $value);
    }

    /**
     *
     */
    public function headerClassName($value = '')
    {
        return $this->set('headerClassName', $value);
    }

    /**
     * Dialog 高度
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * 是否隐藏
     */
    public function hidden($value = true)
    {
        return $this->set('hidden', $value);
    }

    /**
     * 是否隐藏表达式
     */
    public function hiddenOn($value = '')
    {
        return $this->set('hiddenOn', $value);
    }

    /**
     * 组件唯一 id，主要用于日志采集
     */
    public function id($value = '')
    {
        return $this->set('id', $value);
    }

    /**
     *
     */
    public function name($value = '')
    {
        return $this->set('name', $value);
    }

    /**
     * 事件动作配置
     */
    public function onEvent($value = '')
    {
        return $this->set('onEvent', $value);
    }

    /**
     * 是否显示蒙层
     */
    public function overlay($value = true)
    {
        return $this->set('overlay', $value);
    }

    /**
     * 是否显示关闭按钮
     */
    public function showCloseButton($value = true)
    {
        return $this->set('showCloseButton', $value);
    }

    /**
     * 是否显示错误信息
     */
    public function showErrorMsg($value = true)
    {
        return $this->set('showErrorMsg', $value);
    }

    /**
     * 是否显示 spinner
     */
    public function showLoading($value = true)
    {
        return $this->set('showLoading', $value);
    }

    /**
     * Dialog 大小 可选值: xs | sm | md | lg | xl | full
     */
    public function size($value = '')
    {
        return $this->set('size', $value);
    }

    /**
     * feedback 弹框取消是否中断后续操作
     */
    public function skipRestOnCancel($value = true)
    {
        return $this->set('skipRestOnCancel', $value);
    }

    /**
     * feedback 弹框确认是否中断后续操作
     */
    public function skipRestOnConfirm($value = true)
    {
        return $this->set('skipRestOnConfirm', $value);
    }

    /**
     * 是否静态展示
     */
    public function static($value = true)
    {
        return $this->set('static', $value);
    }

    /**
     * 静态展示表单项类名
     */
    public function staticClassName($value = '')
    {
        return $this->set('staticClassName', $value);
    }

    /**
     * 静态展示表单项Value类名
     */
    public function staticInputClassName($value = '')
    {
        return $this->set('staticInputClassName', $value);
    }

    /**
     * 静态展示表单项Label类名
     */
    public function staticLabelClassName($value = '')
    {
        return $this->set('staticLabelClassName', $value);
    }

    /**
     * 是否静态展示表达式
     */
    public function staticOn($value = '')
    {
        return $this->set('staticOn', $value);
    }

    /**
     * 静态展示空值占位
     */
    public function staticPlaceholder($value = '')
    {
        return $this->set('staticPlaceholder', $value);
    }

    /**
     *
     */
    public function staticSchema($value = '')
    {
        return $this->set('staticSchema', $value);
    }

    /**
     * 组件样式
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     *
     */
    public function testid($value = '')
    {
        return $this->set('testid', $value);
    }

    /**
     * 请通过配置 title 设置标题
     */
    public function title($value = '')
    {
        return $this->set('title', $value);
    }

    /**
     * 可以组件级别用来关闭移动端样式
     */
    public function useMobileUI($value = true)
    {
        return $this->set('useMobileUI', $value);
    }

    /**
     * 是否显示
     */
    public function visible($value = true)
    {
        return $this->set('visible', $value);
    }

    /**
     * 可以用来配置 feedback 的出现条件
     */
    public function visibleOn($value = '')
    {
        return $this->set('visibleOn', $value);
    }

    /**
     * Dialog 宽度
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }


}
