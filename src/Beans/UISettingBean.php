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

namespace HPlus\UI\Beans;

class UISettingBean
{
    public function __construct(public $title = '后台管理系统', public $icon = '', public $apiPrefix = '', public $css = [], public $js = [], public $style = [])
    {
    }
}
