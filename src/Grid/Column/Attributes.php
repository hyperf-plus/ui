<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Column;

class Attributes
{

    public $type;

    public $columnKey;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $prop;
    /**
     * @var string
     */
    public $width;

    /**
     * @var string
     */
    public $minWidth;
    /**
     * @var string|boolean
     */
    public $fixed;

    /**
     * @var boolean
     */
    public $showOverflowTooltip;

    /**
     * @var string
     */
    public $align;

    /**
     * @var string
     */
    public $headerAlign;

    /**
     * @var string
     */
    public $className;

    /**
     * @var string
     */
    public $labelClassName;


    /**
     * @var string
     */
    public $help;

    /**
     * @var boolean
     */
    public $sortable;

    public $filters = [];
    public $filterPlacement;
    public $filterMultiple = true;


    public $displayComponentAttrs;


    /**
     * 值前缀
     * @var string
     */
    public $itemPrefix = "";
    /**
     * 后缀
     * @var string
     */
    public $itemSuffix = "";


}
