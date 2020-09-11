<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Grid;


use Mzh\UI\Grid\Concerns\HasActions;
use Mzh\UI\Traits\AdminJsonBuilder;

class Actions extends AdminJsonBuilder
{
    use HasActions;

    protected $row;
    protected $key;

    /**
     * 当前行对象
     * @return mixed
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param mixed $row
     * @return $this
     */
    public function row($row)
    {
        $this->row = $row;
        return $this;
    }

    /**
     * 当前行下标
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return $this
     */
    public function key($key)
    {
        $this->key = $key;
        return $this;
    }


}
