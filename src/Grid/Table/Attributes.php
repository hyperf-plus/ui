<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Table;

class Attributes
{

    public $height;

    public $maxHeight;

    /**
     * @var bool
     */
    public $stripe = true;

    /**
     * @var bool
     */
    public $border = false;

    /**
     * @var string
     */
    public $size = "small";

    /**
     * @var bool
     */
    public $fit = true;

    /**
     * @var bool
     */
    public $showHeader = true;

    /**
     * @var bool
     */
    public $highlightCurrentRow;


    public $emptyText;


    public $tooltipEffect;

    public $rowKey = 'id';



    public $draggable = false;
    public $draggableUrl;

    public $defaultExpandAll = false;

    public $treeProps = ['hasChildren' => 'hasChildren', 'children' => 'children'];


    public $hideActions=false;
    public $actionWidth;
    public $actionLabel = "操作";
    public $actionFixed;
    public $actionAlign = "left";

    public $selection = false;

    public $dataVuex = false;


}
