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


use Closure;
use HPlus\UI\Grid\Filter;

trait HasFilter
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * Get filter of Table.
     *
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    public function applyFilter($toArray = true)
    {
        return $this->filter->execute($toArray);
    }


    public function filter(Closure $callback)
    {
        call_user_func($callback, $this->filter);
    }
}
