<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Form;


class DateTimePicker extends DatePicker
{
    protected $componentName = "DateTimePicker";

    protected $format = "yyyy-MM-dd HH:mm:ss";
    protected $valueFormat = "yyyy-MM-dd HH:mm:ss";

    static public function make($value = null, $type = "datetime")
    {

        return (new DateTimePicker($value))->type($type);
    }

}
