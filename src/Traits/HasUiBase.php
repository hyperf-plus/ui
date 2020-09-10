<?php
declare(strict_types=1);

namespace Mzh\UI\Traits;


use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Mzh\UI\Components\Widgets\Html;
use Psr\Container\ContainerInterface;

trait HasUiBase
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    public function __construct(ContainerInterface $container, RequestInterface $request, ResponseInterface $response)
    {
        $this->response = $response;
        $this->request = $request;
        $this->container = $container;
    }

    protected function isGet()
    {
        return strtolower($this->request->getMethod()) == 'get';
    }

    protected function isPost()
    {
        return strtolower($this->request->getMethod()) == 'post';
    }

    protected function isPut()
    {
        return strtolower($this->request->getMethod()) == 'put';
    }

    protected function isDelete()
    {
        return strtolower($this->request->getMethod()) == 'delete';
    }

    protected function br()
    {
        return Html::make()->html("<br>");
    }

    protected function isGetData()
    {
        return $this->request->query('get_data') == "true";
    }
}