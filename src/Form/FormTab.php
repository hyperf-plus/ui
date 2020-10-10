<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Form;


use HPlus\UI\Form;
use HPlus\UI\Layout\Row;
use HPlus\UI\Traits\AdminJsonBuilder;

class FormTab extends AdminJsonBuilder
{
    protected $name;
    protected $rows = [];
    protected $form;

    public function __construct($name,Form $form)
    {
        $this->name = $name;
        $this->form = $form;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return FormTab
     */
    public function name($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @param Row|\Closure $closure
     * @return $this
     */
    public function row($closure)
    {
        if ($closure instanceof \Closure) {
            $row = new Row();
            call_user_func($closure, $row, $this->form);
            $this->rows = collect($this->rows)->add($row);
        } else {
            $this->rows = collect($this->rows)->add($closure);
        }
        return $this;
    }

    public function jsonSerialize()
    {
        return ['name' => $this->name, 'rows' => $this->rows];
    }


}