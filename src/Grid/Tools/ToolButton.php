<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Grid\Tools;


use Mzh\UI\Actions\BaseAction;
use Mzh\UI\Components\Attrs\Button;

class ToolButton extends BaseAction
{
    use Button;
    protected $uri;
    protected $componentName = "ToolButton";
    protected $handler;

    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @param string $content 按钮内容
     * @return ToolButton
     */
    public static function make($content)
    {
        return new ToolButton($content);
    }

    /**
     * @param mixed $uri
     * @return $this
     */
    public function uri($uri)
    {
        $this->uri = $uri;
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
