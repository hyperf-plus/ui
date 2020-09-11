<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Components\Attrs;


class CascaderOption extends SelectOption
{
    /**
     * @var CascaderOption[]
     */
    protected $children = [];

    protected $leaf = true;

    static function make($value, $label)
    {
        $op = new CascaderOption();
        $op->type = "default";
        $op->value = $value;
        $op->label = $label;
        return $op;
    }

    /**
     * @param CascaderOption[] $children
     * @return $this
     */
    public function children($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @param bool $leaf
     * @return $this
     */
    public function leaf($leaf=true)
    {
        $this->leaf = $leaf;
        return $this;
    }



    public function jsonSerialize()
    {
        $data = [];
        foreach ($this as $key => $val) {
            if (!empty($val)) $data[$key] = $val;
        }
        return $data;
    }

}
