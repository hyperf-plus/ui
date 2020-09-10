<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Concerns;


use Closure;
use Mzh\UI\Grid\Filter;

trait HasFilter
{
    /**
     * @var Filter
     */
    protected $filter;



    public function applyFilter($toArray = true)
    {

        return $this->filter->execute($toArray);
    }


    public function filter(Closure $callback)
    {
        call_user_func($callback, $this->filter);
    }
}
