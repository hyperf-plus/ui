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
 * Chart 图表渲染器。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/carousel.
 *
 * @version 6.2.2
 */
class Chart extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'chart');
    }

    /**
     * 图表配置接口.
     * @param mixed $value
     */
    public function api($value = '')
    {
        return $this->set('api', $value);
    }

    /**
     * Chart 主题配置.
     * @param mixed $value
     */
    public function chartTheme($value = '')
    {
        return $this->set('chartTheme', $value);
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
     * 点击行为配置，可以用来满足下钻操作等。
     * @param mixed $value
     */
    public function clickAction($value = '')
    {
        return $this->set('clickAction', $value);
    }

    /**
     * 配置echart的config，支持数据映射。如果用了数据映射，为了同步更新，请设置 trackExpression.
     * @param mixed $value
     */
    public function config($value = '')
    {
        return $this->set('config', $value);
    }

    /**
     * @param mixed $value
     */
    public function dataFilter($value = '')
    {
        return $this->set('dataFilter', $value);
    }

    /**
     * 默认开启 Config 中的数据映射，如果想关闭，请开启此功能。
     * @param mixed $value
     */
    public function disableDataMapping($value = true)
    {
        return $this->set('disableDataMapping', $value);
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
     * 高度设置.
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
     * 组件唯一 id，主要用于日志采集.
     * @param mixed $value
     */
    public function id($value = '')
    {
        return $this->set('id', $value);
    }

    /**
     * 是否初始加载。
     * @param mixed $value
     */
    public function initFetch($value = true)
    {
        return $this->set('initFetch', $value);
    }

    /**
     * 是否初始加载用表达式来配置.
     * @param mixed $value
     */
    public function initFetchOn($value = '')
    {
        return $this->set('initFetchOn', $value);
    }

    /**
     * 刷新时间.
     * @param mixed $value
     */
    public function interval($value = '')
    {
        return $this->set('interval', $value);
    }

    /**
     * 加载百度地图.
     * @param mixed $value
     */
    public function loadBaiduMap($value = true)
    {
        return $this->set('loadBaiduMap', $value);
    }

    /**
     * 地图名称.
     * @param mixed $value
     */
    public function mapName($value = '')
    {
        return $this->set('mapName', $value);
    }

    /**
     * 获取 geo json 文件的地址
     * @param mixed $value
     */
    public function mapURL($value = '')
    {
        return $this->set('mapURL', $value);
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
     * 默认配置时追加的，如果更新配置想完全替换配置请配置为 true.
     * @param mixed $value
     */
    public function replaceChartOption($value = true)
    {
        return $this->set('replaceChartOption', $value);
    }

    /**
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
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
     * style样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 跟踪表达式，如果这个表达式的运行结果发生变化了，则会更新 Echart，当 config 中用了数据映射时有用。
     * @param mixed $value
     */
    public function trackExpression($value = '')
    {
        return $this->set('trackExpression', $value);
    }

    /**
     * 指定为 chart 类型.
     * @param mixed $value
     */
    public function type($value = 'chart')
    {
        return $this->set('type', $value);
    }

    /**
     * 不可见的时候隐藏.
     * @param mixed $value
     */
    public function unMountOnHidden($value = true)
    {
        return $this->set('unMountOnHidden', $value);
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
     * 宽度设置.
     * @param mixed $value
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }
}
