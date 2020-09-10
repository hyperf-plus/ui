<?php
declare(strict_types=1);
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
