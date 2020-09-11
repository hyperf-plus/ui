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
use Mzh\UI\Layout\Content;

class Card extends Component
{
    protected $componentName = "Card";
    protected $header;
    protected $bodyStyle;
    protected $shadow = "never";

    protected $content;

    public static function make()
    {
        return new Card();
    }

    /**
     * 设置 header
     * @param string $header
     * @return $this
     */
    public function header($header)
    {
        $this->header = instance_content($header);
        return $this;
    }

    /**
     * 设置 body 的样式
     * @param string $bodyStyle
     * @return $this
     */
    public function bodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;
        return $this;
    }

    /**
     * 设置阴影显示时机
     * always / hover / never
     * @param string $shadow
     * @return $this
     */
    public function shadow(string $shadow)
    {
        $this->shadow = $shadow;
        return $this;
    }

    /**
     * 设置内容组件
     * @param  $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = instance_content($content);
        return $this;
    }

}
