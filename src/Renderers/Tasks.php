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
 * Tasks 渲染器，格式说明 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/tasks.
 *
 * @version 6.2.2
 */
class Tasks extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'tasks');
    }

    /**
     * @param mixed $value
     */
    public function btnClassName($value = '')
    {
        return $this->set('btnClassName', $value);
    }

    /**
     * 操作按钮文字.
     * @param mixed $value
     */
    public function btnText($value = '')
    {
        return $this->set('btnText', $value);
    }

    /**
     * @param mixed $value
     */
    public function canRetryStatusCode($value = '')
    {
        return $this->set('canRetryStatusCode', $value);
    }

    /**
     * 用来获取任务状态的 API，当没有进行时任务时不会发送。
     * @param mixed $value
     */
    public function checkApi($value = '')
    {
        return $this->set('checkApi', $value);
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
     * 编辑器配置，运行时可以忽略.
     * @param mixed $value
     */
    public function editorSetting($value = '')
    {
        return $this->set('editorSetting', $value);
    }

    /**
     * @param mixed $value
     */
    public function errorStatusCode($value = '')
    {
        return $this->set('errorStatusCode', $value);
    }

    /**
     * @param mixed $value
     */
    public function finishStatusCode($value = '')
    {
        return $this->set('finishStatusCode', $value);
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
     * @param mixed $value
     */
    public function initialStatusCode($value = '')
    {
        return $this->set('initialStatusCode', $value);
    }

    /**
     * 当有任务进行中，会每隔一段时间再次检测，而时间间隔就是通过此项配置，默认 3s。
     * @param mixed $value
     */
    public function interval($value = '')
    {
        return $this->set('interval', $value);
    }

    /**
     * @param mixed $value
     */
    public function items($value = '')
    {
        return $this->set('items', $value);
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
    public function loadingStatusCode($value = '')
    {
        return $this->set('loadingStatusCode', $value);
    }

    /**
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
     * 操作列说明.
     * @param mixed $value
     */
    public function operationLabel($value = '')
    {
        return $this->set('operationLabel', $value);
    }

    /**
     * 如果任务失败，且可以重试，提交的时候会使用此 API.
     * @param mixed $value
     */
    public function reSubmitApi($value = '')
    {
        return $this->set('reSubmitApi', $value);
    }

    /**
     * @param mixed $value
     */
    public function readyStatusCode($value = '')
    {
        return $this->set('readyStatusCode', $value);
    }

    /**
     * 备注列说明.
     * @param mixed $value
     */
    public function remarkLabel($value = '')
    {
        return $this->set('remarkLabel', $value);
    }

    /**
     * 配置容器重试按钮 className.
     * @param mixed $value
     */
    public function retryBtnClassName($value = '')
    {
        return $this->set('retryBtnClassName', $value);
    }

    /**
     * 重试操作按钮文字.
     * @param mixed $value
     */
    public function retryBtnText($value = '')
    {
        return $this->set('retryBtnText', $value);
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
     * 状态列说明.
     * @param mixed $value
     */
    public function statusLabel($value = '')
    {
        return $this->set('statusLabel', $value);
    }

    /**
     * 状态显示对应的类名配置。
     * @param mixed $value
     */
    public function statusLabelMap($value = '')
    {
        return $this->set('statusLabelMap', $value);
    }

    /**
     * 状态显示对应的文字显示配置。
     * @param mixed $value
     */
    public function statusTextMap($value = '')
    {
        return $this->set('statusTextMap', $value);
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
     * 提交任务使用的 API.
     * @param mixed $value
     */
    public function submitApi($value = '')
    {
        return $this->set('submitApi', $value);
    }

    /**
     * 配置 table className.
     * @param mixed $value
     */
    public function tableClassName($value = '')
    {
        return $this->set('tableClassName', $value);
    }

    /**
     * 任务名称列说明.
     * @param mixed $value
     */
    public function taskNameLabel($value = '')
    {
        return $this->set('taskNameLabel', $value);
    }

    /**
     * 指定为任务类型.
     * @param mixed $value
     */
    public function type($value = 'tasks')
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
