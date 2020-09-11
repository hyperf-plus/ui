<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Components\Widgets;


use Mzh\UI\Components\Component;

class Text extends Component
{

    protected $componentName = "IText";

    protected $text = "";

    /**
     * LvaText constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }


    static public function make($text = "")
    {
        return new Text($text);
    }
}
