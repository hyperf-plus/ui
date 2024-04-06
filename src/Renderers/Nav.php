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
 * Nav 导航渲染器 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/nav.
 *
 * @version 6.2.2
 */
class Nav extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'nav');
    }

    /**
     * 手风琴展开 仅垂直inline模式支持
     * @param mixed $value
     */
    public function accordion($value = true)
    {
        return $this->set('accordion', $value);
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
     * 容器 css 类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 控制菜单缩起.
     * @param mixed $value
     */
    public function collapsed($value = true)
    {
        return $this->set('collapsed', $value);
    }

    /**
     * 默认展开层级 小于等于该层数的节点默认全部打开
     * @param mixed $value
     */
    public function defaultOpenLevel($value = '')
    {
        return $this->set('defaultOpenLevel', $value);
    }

    /**
     * 懒加载 api，如果不配置复用 source 接口。
     * @param mixed $value
     */
    public function deferApi($value = '')
    {
        return $this->set('deferApi', $value);
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
     * 仅允许同层级拖拽.
     * @param mixed $value
     */
    public function dragOnSameLevel($value = true)
    {
        return $this->set('dragOnSameLevel', $value);
    }

    /**
     * 可拖拽.
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
     * 自定义展开图标.
     * @param mixed $value
     */
    public function expandIcon($value = '')
    {
        return $this->set('expandIcon', $value);
    }

    /**
     * 自定义展开图标位置 默认在前面 before after.
     * @param mixed $value
     */
    public function expandPosition($value = '')
    {
        return $this->set('expandPosition', $value);
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
    public function indentSize($value = '')
    {
        return $this->set('indentSize', $value);
    }

    /**
     * 更多操作菜单列表.
     * @param mixed $value
     */
    public function itemActions($value = '')
    {
        return $this->set('itemActions', $value);
    }

    /**
     * 角标.
     * @param mixed $value
     */
    public function itemBadge($value = '')
    {
        return $this->set('itemBadge', $value);
    }

    /**
     * 最多展示多少层级.
     * @param mixed $value
     */
    public function level($value = '')
    {
        return $this->set('level', $value);
    }

    /**
     * 链接地址集合.
     * @param mixed $value
     */
    public function links($value = '')
    {
        return $this->set('links', $value);
    }

    /**
     * 垂直模式 非折叠状态下 控制菜单打开方式 可选值: float | inline.
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
     * 横向导航时自动收纳配置.
     * @param mixed $value
     */
    public function overflow($value = '')
    {
        return $this->set('overflow', $value);
    }

    /**
     * 子菜单项展开浮层样式.
     * @param mixed $value
     */
    public function popupClassName($value = '')
    {
        return $this->set('popupClassName', $value);
    }

    /**
     * 保存排序的 api.
     * @param mixed $value
     */
    public function saveOrderApi($value = '')
    {
        return $this->set('saveOrderApi', $value);
    }

    /**
     * 搜索框相关配置.
     * @param mixed $value
     */
    public function searchConfig($value = '')
    {
        return $this->set('searchConfig', $value);
    }

    /**
     * 是否开启搜索.
     * @param mixed $value
     */
    public function searchable($value = true)
    {
        return $this->set('searchable', $value);
    }

    /**
     * 控制仅展示指定key菜单下的子菜单项.
     * @param mixed $value
     */
    public function showKey($value = '')
    {
        return $this->set('showKey', $value);
    }

    /**
     * 可以通过 API 拉取。
     * @param mixed $value
     */
    public function source($value = '')
    {
        return $this->set('source', $value);
    }

    /**
     * true 为垂直排列，false 为水平排列类似如 tabs。 可选值: 1 |.
     * @param mixed $value
     */
    public function stacked($value = true)
    {
        return $this->set('stacked', $value);
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
     * @param mixed $value
     */
    public function testid($value = '')
    {
        return $this->set('testid', $value);
    }

    /**
     * 主题配色 默认light 可选值: light | dark.
     * @param mixed $value
     */
    public function themeColor($value = '')
    {
        return $this->set('themeColor', $value);
    }

    /**
     * 指定为 Nav 导航渲染器.
     * @param mixed $value
     */
    public function type($value = 'nav')
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
