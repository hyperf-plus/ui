<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Tools;

use JsonSerializable;

class QuickSearch implements JsonSerializable
{
    public $searchKey = '__search__';
    public $placeholder = "输入搜索关键字";
    /**
     * @var array|string|\Closure
     */
    public $search;

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'searchKey' => $this->searchKey,
            'placeholder' => $this->placeholder,
        ];
    }
}
