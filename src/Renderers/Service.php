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
 * Service 服务类控件。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/service.
 *
 * @version 6.2.2
 */
class Service extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'service');
    }

    /**
     * 页面初始化的时候，可以设置一个 API 让其取拉取，发送数据会携带当前 data 数据（包含地址栏参数），获取得数据会合并到 data 中，供组件内使用。
     * @param mixed $value
     */
    public function api($value = '')
    {
        return $this->set('api', $value);
    }

    /**
     * 内容区域
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
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
     * 通过调用外部函数来获取数据.
     * @param mixed $value
     */
    public function dataProvider($value = '')
    {
        return $this->set('dataProvider', $value);
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
    public function fetchOn($value = '')
    {
        return $this->set('fetchOn', $value);
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
     * 是否默认就拉取？
     * @param mixed $value
     */
    public function initFetch($value = true)
    {
        return $this->set('initFetch', $value);
    }

    /**
     * 是否默认就拉取？通过表达式来决定.
     * @param mixed $value
     */
    public function initFetchOn($value = '')
    {
        return $this->set('initFetchOn', $value);
    }

    /**
     * 是否默认加载 schemaApi.
     * @param mixed $value
     */
    public function initFetchSchema($value = true)
    {
        return $this->set('initFetchSchema', $value);
    }

    /**
     * 用表达式来配置。
     * @param mixed $value
     */
    public function initFetchSchemaOn($value = '')
    {
        return $this->set('initFetchSchemaOn', $value);
    }

    /**
     * 是否轮询拉取.
     * @param mixed $value
     */
    public function interval($value = '')
    {
        return $this->set('interval', $value);
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
    public function messages($value = '')
    {
        return $this->set('messages', $value);
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
     * 用来获取远程 Schema 的 api.
     * @param mixed $value
     */
    public function schemaApi($value = '')
    {
        return $this->set('schemaApi', $value);
    }

    /**
     * 是否以Alert的形式显示api接口响应的错误信息，默认展示.
     * @param mixed $value
     */
    public function showErrorMsg($value = true)
    {
        return $this->set('showErrorMsg', $value);
    }

    /**
     * 是否静默拉取.
     * @param mixed $value
     */
    public function silentPolling($value = true)
    {
        return $this->set('silentPolling', $value);
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
     * 关闭轮询的条件。
     * @param mixed $value
     */
    public function stopAutoRefreshWhen($value = '')
    {
        return $this->set('stopAutoRefreshWhen', $value);
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
     * 指定为 Service 数据拉取控件。
     * @param mixed $value
     */
    public function type($value = 'service')
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
     * WebScocket 地址，用于实时获取数据.
     * @param mixed $value
     */
    public function ws($value = '')
    {
        return $this->set('ws', $value);
    }
}
