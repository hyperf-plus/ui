<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

class EndsWith extends Like
{
    protected $exprFormat = '%{value}';
}
