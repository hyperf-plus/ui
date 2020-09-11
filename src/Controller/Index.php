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

use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Annotation\AutoController;
use Mzh\UI\Facades\Admin;

/**
 * @AutoController(prefix="/admin")
 * Class IndexAdminController
 * @package Mzh\UI\Controller
 */
class Index extends AbstractUIController
{

    public function index()
    {
        $data = [
            'isLocal' => config('app.env') == "local",
            'menu' => Admin::menu(),
            'menuList' => Admin::menuList(),
            'logoShow' => config('admin.logo_show'),
            'logo' => config('admin.logo'),
            'logoLight' => config('admin.logo_light'),
            'logoMini' => config('admin.logo_mini'),
            'logoMiniLight' => config('admin.logo_mini_light'),
            'name' => config('admin.name'),
            'copyright' => config('admin.copyright'),
            'footerLinks' => config('admin.footerLinks'),
            'uniqueOpened' => config('admin.unique_opened', false),
            'user' => $this->getUserData(),
            'url' => $this->getUrls()
        ];
        $pageData = json_encode($data, 256);
        $html = <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="x4LYW3KiEUjRqUE4zsbnT5Niwzube5Z02Te1SbXb">
    <title>HyperfVueAdmin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        </head>
<body>
<div id="app"><root :page_data='$pageData'></root></div>
<script>
    Admin = {};
    Admin.token = "x4LYW3KiEUjRqUE4zsbnT5Niwzube5Z02Te1SbXb";
    window.config = {
        'apiRoot': ""
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
        return $this->response->withBody(new SwooleStream($html))->withHeader('content-type', 'text/html; charset=utf8');
    }

    protected function getUserData()
    {
        return json_decode('{"id":3,"username":"admin","name":"admin","avatar":"https:\/\/gw.alipayobjects.com\/zos\/antfincdn\/XAosXuNZyF\/BiazfanxmamNRoxxVxka.png"}', true);
    }

    protected function getUrls()
    {
        return [
            'logout' => route('admin/logout'),
            'setting' => route('admin/setting')
        ];
    }
}
