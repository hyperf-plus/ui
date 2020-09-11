<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Grid\Actions;


use Mzh\UI\Components\Attrs\ElLink;
use Mzh\UI\Components\Component;

class ActionLink extends Component
{
    use ElLink;

    protected $componentName = "ActionLink";
    protected $uri;
    protected $handler;
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    protected static function make($content)
    {
        return new ActionLink($content);
    }

    /**
     * @param mixed $uri
     * @return $this
     */
    public function uri($uri)
    {
        $this->uri = $uri;
        $this->href = $uri;
        return $this;
    }

    /**
     * @param string $handler 响应类型 request|route|link
     * @return $this
     */
    public function handler($handler)
    {
        $this->handler = $handler;
        return $this;
    }
}
