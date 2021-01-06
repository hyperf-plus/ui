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


use App\Components\SubForm;
use HPlus\UI\Actions\BaseAction;
use HPlus\UI\Exception\BusinessException;

class Button extends BaseAction
{
    use \HPlus\UI\Components\Attrs\Button;

    protected $componentName = "Button";


    const HANDLER_ROUTE = "route";
    const HANDLER_LINK = "link";
    const HANDLER_REQUEST = "request";

    protected $uri;
    protected $subFormEmit;
    protected $subForm = [];
    protected $handler;


    public function __construct($content)
    {
        parent::__construct();

        $this->content = $content;
    }

    /**
     * @param string $content 按钮内容
     * @return $this
     */
    public static function make($content = null)
    {
        return new Button($content);
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
        if (!in_array($handler, [self::HANDLER_LINK, self::HANDLER_REQUEST, self::HANDLER_ROUTE])) {
            throw new BusinessException(400, "ActionButton 事件类型错误");
        }
        $this->handler = $handler;
        return $this;
    }

    public function route($uri)
    {
        $this->uri = $uri;
        $this->handler = self::HANDLER_ROUTE;
        return $this;
    }

    public function addSubItem(SubForm $formItems)
    {
        $this->subFormEmit = $formItems->getSubFormEmit();
        $this->subForm = $formItems->getFormItems();
        return $this;
    }
}
