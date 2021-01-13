<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Grid\Concerns;


use HPlus\UI\Grid\Column;
use HPlus\UI\Grid\Model;
use HPlus\UI\Grid\Tools\QuickSearch;

/**
 * 简单导出已废弃，请使用 Exporter
 * @deprecated
 * @method  Model model()
 */
trait HasExport
{

    /**
     * 是否开启搜索条件导出
     * @var bool
     */
    public $simpleExport = false;
    /**
     * 搜索条件导出路径例如 /admin/user/export  后面不需要参数，会根据搜索参数自动加上的
     * @var string
     */
    public $exportPath = '';


    /**
     * 开启搜索条件导出
     * @param null $search
     * @return $this
     */
    public function simpleExport($simpleExport = true)
    {
        $this->simpleExport = $simpleExport;
        return $this;
    }

    /**
     * 搜索条件导出路径例如 /admin/user/export  后面不需要参数，会根据搜索参数自动加上的
     * @param null $search
     * @return $this
     */
    public function exportPath($exportPath = '')
    {
        $this->exportPath = $exportPath;
        return $this;
    }
}
