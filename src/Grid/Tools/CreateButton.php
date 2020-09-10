<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Tools;


use Mzh\UI\Actions\BaseAction;
use Mzh\UI\Components\Attrs\Button;

class CreateButton extends BaseAction
{
    use Button;

    protected $componentName = "GridCreateButton";

    protected $isDialog = false;

    /**
     * @param bool $isDialog
     * @return CreateButton
     */
    public function isDialog(bool $isDialog)
    {
        $this->isDialog = $isDialog;
        return $this;
    }





}