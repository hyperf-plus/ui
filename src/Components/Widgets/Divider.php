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

class Divider extends Component
{
    protected $componentName = "Divider";

    protected $direction = "horizontal";
    protected $contentPosition = "left";

    protected $content;

    /**
     * Divider constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public static function make($content)
    {
        return new Divider($content);
    }


    /**
     * @param string $direction
     * @return $this
     */
    public function direction(string $direction)
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @param string $contentPosition
     * @return $this
     */
    public function contentPosition(string $contentPosition)
    {
        $this->contentPosition = $contentPosition;
        return $this;
    }


}
