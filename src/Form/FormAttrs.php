<?php
declare(strict_types=1);
namespace Mzh\UI\Form;


class FormAttrs
{
    public $className;
    public $style;

    public $rules;
    public $inline = false;
    public $labelPosition = 'right';
    public $labelWidth = "80px";
    public $labelSuffix = "：";
    public $hideRequiredAsterisk = false;
    public $showMessage = true;
    public $inlineMessage = false;
    public $statusIcon = false;
    public $validateOnRuleChange = true;
    public $size;
    public $disabled = false;

    public $hideTab = true;

    public $isDialog = false;

    public $createButtonName = "立即添加";
    public $updateButtonName = "立即修改";
    public $backButtonName = "返回";
    public $buttonWidth;

}
