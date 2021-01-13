<?php
declare(strict_types=1);

/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\HttpMessage\Server\Response;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Request;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Context;
use HPlus\UI\Components\Widgets\Html;
use HPlus\UI\Layout\Content;
use HPlus\UI\StorageFactory;
use Psr\Http\Message\ServerRequestInterface;

if (!function_exists('Storage')) {
    /**
     * @param string $fileSystem
     * @return StorageFactory
     */
    function Storage($fileSystem = '')
    {
        return get_container(StorageFactory::class)->disk($fileSystem);
    }
}


if (!function_exists('redis')) {
    /**
     * Redis
     * @param string $name
     * @return \Hyperf\Redis\RedisProxy|Redis
     */
    function redis($name = 'default')
    {
        return ApplicationContext::getContainer()->get(RedisFactory::class)->get($name);
    }
}

if (!function_exists('Logger')) {
    /**
     * Redis
     * @return StdoutLoggerInterface
     */
    function Logger()
    {
        return ApplicationContext::getContainer()->get(StdoutLoggerInterface::class);
    }
}

if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        /**
         * @var ServerRequestInterface $request
         */
        $request = Context::get(ServerRequestInterface::class);
        $ip_addr = $request->getHeaderLine('x-forwarded-for');
        if (verify_ip($ip_addr)) {
            return $ip_addr;
        }
        $ip_addr = $request->getHeaderLine('remote-host');
        if (verify_ip($ip_addr)) {
            return $ip_addr;
        }
        $ip_addr = $request->getHeaderLine('x-real-ip');
        if (verify_ip($ip_addr)) {
            return $ip_addr;
        }
        $ip_addr = $request->getServerParams()['remote_addr'] ?? '0.0.0.0';
        if (verify_ip($ip_addr)) {
            return $ip_addr;
        }
        return '0.0.0.0';
    }
}


if (!function_exists('get_container')) {
    function get_container($id)
    {
        return ApplicationContext::getContainer()->get($id);
    }
}

if (!function_exists('verify_ip')) {
    function verify_ip($realip)
    {
        return filter_var($realip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
}
//输出控制台日志
if (!function_exists('p')) {
    function p($val, $title = null, $starttime = '')
    {
        print_r('[ ' . date("Y-m-d H:i:s") . ']:');
        if ($title != null) {
            print_r("[" . $title . "]:");
        }
        print_r($val);
        print_r("\r\n");
    }
}

if (!function_exists('uuid')) {
    function uuid($length)
    {
        if (function_exists('random_bytes')) {
            $uuid = bin2hex(\random_bytes($length));
        } else if (function_exists('openssl_random_pseudo_bytes')) {
            $uuid = bin2hex(\openssl_random_pseudo_bytes($length));
        } else {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $uuid = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        }
        return $uuid;
    }
}
if (!function_exists('generate_tree')) {
    function generate_tree(array $array, $pid_key = 'pid', $id_key = 'id', $children_key = 'children', $callback = null)
    {
        if (!$array) {
            return [];
        }
        //第一步 构造数据
        $items = [];
        foreach ($array as $value) {
            if ($callback && is_callable($callback)) {
                $callback($value);
            }
            $items[$value[$id_key]] = $value;
        }
        //第二部 遍历数据 生成树状结构
        $tree = [];
        foreach ($items as $key => $value) {
            //如果pid这个节点存在
            if (isset($items[$value[$pid_key]])) {
                $items[$value[$pid_key]][$children_key][] = &$items[$key];
            } else {
                $tree[] = &$items[$key];
            }
        }

        return $tree;
    }
}


if (!function_exists('is_validURL')) {

    function is_validURL($url)
    {
        $check = 0;
        if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
            $check = 1;
        }
        return $check;
    }
}


if (!function_exists('route')) {
    function route($url, $param = [])
    {
        if (is_validURL($url)) {
            return $url;
        }
        $prefix = config('admin.route.prefix');
        $https = config('admin.https');
        $uri = request()->getUri();
        $param = http_build_query($param);
        if ($https) {
            $uri = $uri->withScheme('https');
        }
        $uri = $uri->withQuery($param);
        if (substr($url, 0, 1) !== '/') {
            $url = '/' . $prefix . '/' . $url;
        }
        return $uri->withPath($url)->__toString();
    }
}


if (!function_exists('request')) {
    /**
     * Get admin path.
     *
     * @param null $key
     * @param null $default
     * @return string
     */
    function request($key = null, $default = null)
    {
        if ($key !== null) {
            return (new  Request())->all()[$key] ?? $default;
        }
        return new  Request();
    }
}


if (!function_exists('response')) {
    /**
     * Get admin path.
     *
     * @param string $path
     *
     * @return string
     */
    function response(): ResponseInterface
    {
        return new Response();//return $res->withBody(new SwooleStream(json_encode($re_data,256)));
    }
}

if (!function_exists('admin_api_base_path')) {
    /**
     * Get admin url.
     *
     * @param string $path
     *
     * @return string
     */
    function admin_api_base_path($path = '')
    {
        $prefix = '/' . trim(config('admin.route.prefix_api'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        $path = trim($path, '/');

        if (is_null($path) || strlen($path) == 0) {
            return $prefix ?: '/';
        }

        return $prefix . '/' . $path;
    }
}

if (!function_exists('admin_api_url')) {
    /**
     * Get admin url.
     *
     * @param string $path
     * @param mixed $parameters
     * @param bool $secure
     *
     * @return string
     */
    function admin_api_url($path = '', $parameters = [], $secure = null)
    {
        return '/' . str_replace('/list', '', $path);
    }
}

if (!function_exists('instance_content')) {
    function instance_content($content = '')
    {
        if (is_string($content)) {
            return Html::make()->html($content);
        } elseif ($content instanceof \Closure) {
            $c_content = new Content();
            call_user_func($content, $c_content);
            return $c_content;
        } else {
            return $content;
        }
    }
}


if (!function_exists('admin_asset')) {
    /**
     * @param $path
     *
     * @return string
     */
    function admin_asset($path)
    {
        return $path;
    }
}