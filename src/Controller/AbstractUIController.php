<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Request;
use Mzh\UI\Components\Widgets\Html;
use Mzh\UI\Layout\Content;
use Psr\Container\ContainerInterface;

abstract class AbstractUIController
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

    public function index()
    {
        $content = new Content();
        //可以重写这里，实现自定义布局
        $content->body($this->grid())->className("m-10");
        //这里必须这样写
        return $this->isGetData() ? $this->grid() : $content;
    }

    public function create()
    {
        $content = new Content();
        //可以重写这里，实现自定义布局
        $content->body($this->form())->className("m-10");
        //这里必须这样写
        return $this->isGetData() ? $this->form() : $content;
    }

    public function edit($id)
    {
        $content = new Content();
        //可以重写这里，实现自定义布局
        $content->body($this->form(true)->edit($id))->className("m-10");
        //这里必须这样写
        return $this->isGetData() ? $this->form(true)->edit($id) : $content;
    }

    protected function br()
    {
        return Html::make()->html("<br>");
    }

    protected function isGetData()
    {
        return $this->request->query('get_data') == "true";
    }

    protected function validatorData(Request $request, $rules, $message = [])
    {
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return $this->responseError($validator->errors()->first(), 400);
        }
        return $validator;
    }

    protected function response($data, $message = '', $code = 200, $headers = [])
    {
        return $this->response->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function responseMessage($message = '', $code = 200)
    {
        return $this->response([], $message, $code);
    }

    protected function responseError($message = '', $code = 400)
    {
        return $this->response([], $message, $code);
    }

    protected function responseRedirect($url = '', $message = '', $code = 301)
    {
        return $this->response($url, $message, $code);
    }
}
