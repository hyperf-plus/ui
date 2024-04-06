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
 * Table View 表格展现.
 *
 * @version 6.2.2
 */
class TableView extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'table-view');
    }

    /**
     * 指定为 table-view 渲染器。
     * @param mixed $value
     */
    public function type($value = 'table-view')
    {
        return $this->set('type', $value);
    }
}
