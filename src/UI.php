<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HPlus\UI;

use HPlus\Admin\Traits\AssetsTrait;
use HPlus\UI\Beans\UISettingBean;

class UI
{
    use AssetsTrait;

    public static function view(UISettingBean $setting)
    {
        $html = file_get_contents(__DIR__ . '/../admin-views/dist/index.html');
        return str_replace([
            '<title></title>',
            "'/admin-api'</script>",
        ], [
            '<title>' . $setting->title . '</title>',
            "'{$setting->apiPrefix}'</script>",
        ], $html);
    }
}
