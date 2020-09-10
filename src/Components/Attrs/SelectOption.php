<?php
declare(strict_types=1);

namespace Mzh\UI\Components\Attrs;
use Mzh\UI\Traits\AdminJsonBuilder;
class SelectOption extends AdminJsonBuilder
{
    protected $type = "default";
    protected $label;
    protected $value;
    protected $avatar;
    protected $desc;
    protected $disabled = false;

    static function make($value, $label)
    {
        $op = new SelectOption();
        $op->type = "default";
        $op->value = $value;
        $op->label = $label;
        return $op;
    }

    /**
     * 是否禁用该选项
     * @param bool $disabled
     * @return $this
     */
    public function disabled($disabled = true)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @param string $avatar
     * @return $this
     */
    public function avatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @param mixed $desc
     * @return $this
     */
    public function desc($desc)
    {
        $this->desc = $desc;
        return $this;
    }
}
