<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

class StartsWith extends Like
{
    protected $exprFormat = '{value}%';
}
