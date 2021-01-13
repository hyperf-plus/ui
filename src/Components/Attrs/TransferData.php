<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Attrs;
use HPlus\UI\Traits\AdminJsonBuilder;
class TransferData extends AdminJsonBuilder
{

    protected $key;
    protected $label;
    protected $disabled = false;


    static public function make($key, $label, $disabled = false)
    {
        return new TransferData($key, $label, $disabled);
    }

    /**
     * TransferData constructor.
     * @param $key
     * @param $label
     * @param bool $disabled
     */
    public function __construct($key, $label, $disabled)
    {
        $this->key = $key;
        $this->label = $label;
        $this->disabled = $disabled;
    }


    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        $data = [];
        foreach ($this as $key => $val) {
            $data[$key] = $val;
        }
        return $data;
    }
}
