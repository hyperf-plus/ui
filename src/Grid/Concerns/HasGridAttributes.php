<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Grid\Concerns;

use Mzh\UI\Grid\Table\Attributes;

trait HasGridAttributes
{

    /**
     * @var Attributes
     */
    protected $attributes;


    /**
     * Table 的高度，默认为自动高度。如果 height 为 number 类型，单位 px；如果 height 为 string 类型，则这个高度会设置为 Table 的 style.height 的值，Table 的高度会受控于外部样式。
     * @param string|int $height
     * @return $this
     */
    public function height($height)
    {
        $this->attributes->height = $height;
        return $this;
    }

    /**
     * js计算页面高度，使表格高度撑满窗口
     * @return $this
     */
    public function autoHeight(){
        $this->attributes->height = 'auto';
        return $this;
    }


    /**
     * Table 的最大高度。合法的值为数字或者单位为 px 的高度。
     * @param string|int $maxHeight
     * @return $this
     */
    public function maxHeight($maxHeight)
    {
        $this->attributes->maxHeight = $maxHeight;
        return $this;
    }

    /**
     * 是否为斑马纹 table
     * @param bool $stripe
     * @return $this
     */
    public function stripe($stripe = true)
    {
        $this->attributes->stripe = $stripe;
        return $this;
    }

    /**
     * 是否带有纵向边框
     * @param bool $border
     * @return $this
     */
    public function border($border = true)
    {
        $this->attributes->border = $border;
        return $this;
    }

    /**
     * Table 的尺寸
     * medium / small / mini
     * @param string $size
     * @return $this
     */
    public function size(string $size)
    {
        $this->attributes->size = $size;
        return $this;
    }


    /**
     * 列的宽度是否自撑开
     * @param bool $fit
     * @return $this
     */
    public function fit(bool $fit = true)
    {
        $this->attributes->fit = $fit;
        return $this;
    }


    /**
     * 是否显示表头
     * @param bool $showHeader
     * @return $this
     */
    public function showHeader($showHeader = true)
    {
        $this->attributes->showHeader = $showHeader;
        return $this;
    }


    /**
     * 是否要高亮当前行
     * @param bool $highlightCurrentRow
     * @return $this
     */
    public function highlightCurrentRow($highlightCurrentRow = true)
    {
        $this->attributes->highlightCurrentRow = $highlightCurrentRow;
        return $this;
    }

    /**
     * 空数据时显示的文本内容
     * @param string $emptyText
     * @return $this
     */
    public function emptyText($emptyText)
    {
        $this->attributes->emptyText = $emptyText;
        return $this;
    }

    /**
     * tooltip effect 属性
     * dark/light
     * @param string $tooltipEffect
     * @return $this
     */
    public function tooltipEffect($tooltipEffect)
    {
        $this->attributes->tooltipEffect = $tooltipEffect;
        return $this;
    }

    public function rowKey($rowKey)
    {
        $this->attributes->rowKey = $rowKey;
        return $this;
    }


    /**
     * @param $url
     * @return $this
     * @deprecated
     * 开启拖拽排序
     */
    public function draggable($url)
    {
        $this->attributes->draggable = true;
        $this->attributes->draggableUrl = $url;
        return $this;
    }

    /**
     * 是否默认展开所有行，当 Table 包含展开行存在或者为树形表格时有效
     * @param bool $defaultExpandAll
     * @return $this
     */
    public function defaultExpandAll($defaultExpandAll = true)
    {
        $this->attributes->defaultExpandAll = $defaultExpandAll;
        return $this;
    }

    public function treeProps($hasChildren, $children)
    {
        $this->attributes->treeProps = [
            'hasChildren' => $hasChildren,
            'children' => $children,
        ];
    }


    public function getTreeChildrenName()
    {
        return $this->attributes->treeProps['children'];
    }

    /**
     * 是否开启多选
     * @param bool $selection
     * @return $this
     */
    public function selection($selection = true)
    {
        $this->attributes->selection = $selection;
        return $this;
    }

    /**
     * 操作栏宽度
     * @param $actionWidth
     * @return $this
     */
    public function actionWidth($actionWidth)
    {
        $this->attributes->actionWidth = $actionWidth;
        return $this;
    }

    /**
     * 操作栏名称
     * @param $actionLabel
     * @return $this
     */
    public function actionLabel($actionLabel)
    {
        $this->attributes->actionLabel = $actionLabel;
        return $this;
    }

    /**
     * 操作栏对齐
     * left  right  center
     * @param $actionAlign
     * @return $this
     */
    public function actionAlign($actionAlign)
    {
        $this->attributes->actionAlign = $actionAlign;
        return $this;
    }

    /**
     * 操作栏固定位置
     * @param $actionFixed
     * @return $this
     */
    public function actionFixed($actionFixed)
    {
        $this->attributes->actionFixed = $actionFixed;
        return $this;
    }

    /**
     * 隐藏操作栏
     * @return $this
     */
    public function hideActions()
    {
        $this->attributes->hideActions = true;
        return $this;
    }
    public function getHideActions()
    {
        return $this->attributes->hideActions;

    }

    /**
     * 表格数据是否存入vuex
     * @param $dataVuex
     * @return $this
     */
    public function dataVuex($dataVuex = true)
    {
        $this->attributes->dataVuex = $dataVuex;
        return $this;
    }

}
