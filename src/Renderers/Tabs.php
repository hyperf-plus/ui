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
 * 选项卡控件。 文档：https://aisuda.bce.baidu.com/amis/zh-CN/components/tabs.
 *
 * @version 6.2.2
 */
class Tabs extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'tabs');
    }

    /**
     * 激活的选项卡，hash值或索引值，支持使用表达式.
     * @param mixed $value
     */
    public function activeKey($value = '')
    {
        return $this->set('activeKey', $value);
    }

    /**
     * 自定义增加按钮文案.
     * @param mixed $value
     */
    public function addBtnText($value = '')
    {
        return $this->set('addBtnText', $value);
    }

    /**
     * 是否支持新增.
     * @param mixed $value
     */
    public function addable($value = true)
    {
        return $this->set('addable', $value);
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
     * 是否支持删除.
     * @param mixed $value
     */
    public function closable($value = true)
    {
        return $this->set('closable', $value);
    }

    /**
     * 折叠按钮文字.
     * @param mixed $value
     */
    public function collapseBtnLabel($value = '')
    {
        return $this->set('collapseBtnLabel', $value);
    }

    /**
     * 超过多少个时折叠按钮.
     * @param mixed $value
     */
    public function collapseOnExceed($value = '')
    {
        return $this->set('collapseOnExceed', $value);
    }

    /**
     * 内容类名.
     * @param mixed $value
     */
    public function contentClassName($value = '')
    {
        return $this->set('contentClassName', $value);
    }

    /**
     * 初始化激活的选项卡，hash值或索引值，支持使用表达式.
     * @param mixed $value
     */
    public function defaultKey($value = '')
    {
        return $this->set('defaultKey', $value);
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
     * 是否支持拖拽.
     * @param mixed $value
     */
    public function draggable($value = true)
    {
        return $this->set('draggable', $value);
    }

    /**
     * 是否可编辑标签名.
     * @param mixed $value
     */
    public function editable($value = true)
    {
        return $this->set('editable', $value);
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
     * 链接外层类名.
     * @param mixed $value
     */
    public function linksClassName($value = '')
    {
        return $this->set('linksClassName', $value);
    }

    /**
     * 卡片是否只有在点开的时候加载？
     * @param mixed $value
     */
    public function mountOnEnter($value = true)
    {
        return $this->set('mountOnEnter', $value);
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
     * 是否导航支持内容溢出滚动。属性废弃，为了兼容暂且保留.
     * @param mixed $value
     */
    public function scrollable($value = true)
    {
        return $this->set('scrollable', $value);
    }

    /**
     * 是否显示提示.
     * @param mixed $value
     */
    public function showTip($value = true)
    {
        return $this->set('showTip', $value);
    }

    /**
     * tooltip 提示的类名.
     * @param mixed $value
     */
    public function showTipClassName($value = '')
    {
        return $this->set('showTipClassName', $value);
    }

    /**
     * 编辑器模式，侧边的位置 可选值: left | right.
     * @param mixed $value
     */
    public function sidePosition($value = '')
    {
        return $this->set('sidePosition', $value);
    }

    /**
     * 关联已有数据，选项卡直接根据目标数据重复。
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
     * 组件样式.
     * @param mixed $value
     */
    public function style($value = '')
    {
        return $this->set('style', $value);
    }

    /**
     * 如果是水平排版，这个属性可以细化水平排版的左右宽度占比。
     * @param mixed $value
     */
    public function subFormHorizontal($value = '')
    {
        return $this->set('subFormHorizontal', $value);
    }

    /**
     * 配置子表单项默认的展示方式。 可选值: normal | inline | horizontal.
     * @param mixed $value
     */
    public function subFormMode($value = '')
    {
        return $this->set('subFormMode', $value);
    }

    /**
     * 是否滑动切换只在移动端生效.
     * @param mixed $value
     */
    public function swipeable($value = true)
    {
        return $this->set('swipeable', $value);
    }

    /**
     * 选项卡成员。当配置了 source 时，选项卡成员，将会根据目标数据进行重复。
     * @param mixed $value
     */
    public function tabs($value = '')
    {
        return $this->set('tabs', $value);
    }

    /**
     * 展示形式.
     * @param mixed $value
     */
    public function tabsMode($value = '')
    {
        return $this->set('tabsMode', $value);
    }

    /**
     * 可以在右侧配置点其他功能按钮。
     * @param mixed $value
     */
    public function toolbar($value = '')
    {
        return $this->set('toolbar', $value);
    }

    /**
     * @param mixed $value
     */
    public function type($value = 'tabs')
    {
        return $this->set('type', $value);
    }

    /**
     * 卡片隐藏的时候是否销毁卡片内容.
     * @param mixed $value
     */
    public function unmountOnExit($value = true)
    {
        return $this->set('unmountOnExit', $value);
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
