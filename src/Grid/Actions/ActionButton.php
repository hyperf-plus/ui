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


use Mzh\UI\Actions\BaseRowAction;
use Mzh\UI\Components\Attrs\Button;
use Mzh\UI\Grid\Concerns\HasDialog;

class ActionButton extends BaseRowAction
{

    const HANDLER_ROUTE = "route";
    const HANDLER_LINK = "link";
    const HANDLER_REQUEST = "request";

    use Button;
    protected $uri;
    protected $componentName = "ActionButton";
    protected $handler;


    public function __construct($content)
    {
        parent::__construct();

        $this->content = $content;
        $this->type("text");
    }

    /**
     * @param string $content 按钮内容
     * @return ActionButton
     */
    public static function make($content)
    {
        return new ActionButton($content);
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
        abort_if(!in_array($handler, [self::HANDLER_LINK, self::HANDLER_REQUEST, self::HANDLER_ROUTE]), 400, "ActionButton 事件类型错误");

        $this->handler = $handler;
        return $this;
    }

    public function route($uri){
        $this->uri = $uri;
        $this->handler = self::HANDLER_ROUTE;
        return $this;
    }
}
