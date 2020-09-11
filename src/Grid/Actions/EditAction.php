<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Grid\Actions;


use Mzh\UI\Actions\BaseRowAction;

class EditAction extends BaseRowAction
{


    protected $componentName = "EditAction";

    protected $type = "text";

    protected $content = "编辑";

    protected $isDialog = false;

    /**
     * @param bool $isDialog
     * @return EditAction
     */
    public function isDialog(bool $isDialog=true)
    {
        $this->isDialog = $isDialog;
        return $this;
    }


}
