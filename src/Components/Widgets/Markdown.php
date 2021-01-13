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

class Markdown extends Component
{
    protected $componentName = "Markdown";

    protected $content;


    public function __construct($content)
    {

        $this->content = $content;
    }

    public static function make($content=""){
        return new Markdown($content);
    }


    public function content($content)
    {
        $this->content = $content;
        return $this;
    }


}
