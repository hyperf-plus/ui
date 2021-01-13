<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Widgets;


use HPlus\UI\Components\Component;

class Html extends Component
{
    protected $componentName = "Html";

    protected $html = "";


    public function __construct(string $html)
    {
        $this->html = $html;
    }


    public static function make($html = "")
    {
        return new Html($html);
    }

    /**
     * @param string $html
     * @return $this
     */
    public function html(string $html)
    {
        $this->html = $html;
        return $this;
    }


}
