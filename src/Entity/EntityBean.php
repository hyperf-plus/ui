<?php
declare(strict_types=1);

namespace HPlus\UI\Entity;

use Hyperf\Utils\Arr;

class EntityBean
{
    public function __construct($array = [])
    {
        foreach ($array as $item => $value) {
            $method = 'set' . $this->convert_under_line($item);
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $value);
            }
        }
    }

    protected function convert_under_line($str)
    {
        $str = preg_replace_callback('/([-_]+([a-z]{1}))/i', function ($matches) {
            return strtoupper($matches[2]);
        }, $str);
        return $str;
    }

    public function toArray()
    {
        return (array)$this;
    }

}