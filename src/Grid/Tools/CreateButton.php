<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
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
