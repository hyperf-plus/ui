<?php
declare(strict_types=1);
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
