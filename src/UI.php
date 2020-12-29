<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 *
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI;

use HPlus\UI\Entity\UISettingEntity;
use Hyperf\HttpMessage\Server\Response;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;

class UI
{
    public static $metaTitle;

    public static function response($data, $message = '', $code = 200, $headers = [])
    {
        $re_data = [
            'code' => $code,
            'message' => $message,
        ];
        if ($data) {
            $re_data['data'] = $data;
        }
        $response = new Response();
        return $response->withBody(new SwooleStream(json_encode($re_data, 256)));
    }

    public static function responseMessage($message = '', $code = 200)
    {
        return self::response([], $message, $code);
    }

    public static function responseError($message = '', $code = 400)
    {
        return self::response([], $message, $code);
    }

    /**
     * @param $url
     * @param bool $isVueRoute
     * @param string $message
     * @param string $type info/success/warning/error
     */
    public static function responseRedirect($url, $isVueRoute = true, $message = null, $type = 'success')
    {
        return self::response([
            'url' => $url,
            'isVueRoute' => $isVueRoute,
            'type' => $type,
        ], $message, 301);
    }

    public static function view(UISettingEntity $setting)
    {
        $apiRoot = $setting->getApiRoot();
        $homeUrl = $setting->getHomeUrl();
        $token = $setting->getUser()->getToken();
        $title = $setting->getTitle();
        if ($setting->getUser()->getId() > 0) {
            $root = 'root';
        } else {
            $root = 'login';
        }
        $pageData = $setting->toArray();
         
        #兼容老入口文件的未导入admin配置问题
        if (empty($setting->getAuth())) {
            $pageData = array_merge($pageData, config('admin'));
        }
        $pageData = json_encode($pageData, 256);
        $html = <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$title}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        </head>
<body>
<div id="app"><{$root} :page-data='{$pageData}'></{$root}></div>
<script>
    Admin = {};
    Admin.token = "{$token}";
    window.config = {
        'apiRoot': "{$apiRoot}",
        'homeUrl': "{$homeUrl}"
    }
</script>
<script src="/static/manifest.js?id=8991394a854ee5cdffc3"></script>
<script src="/static/vendor.js?id=19cf768af01908eb256c"></script>
<script src="/static/app.js?id=beb2afa4a0bcd20be1f4"></script>
<script>
    window.VueAdmin = new CreateVueAdmin(config)
</script>
<script>
    VueAdmin.liftOff()
</script>
</body>
</html>
EOF;
        return \Hyperf\Utils\Context::get(ResponseInterface::class)->withBody(new SwooleStream($html))->withHeader('content-type', 'text/html; charset=utf8');
    }
}
