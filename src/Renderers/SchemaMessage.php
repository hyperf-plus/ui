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

namespace HPlus\UI\Renderers;

/**
 * 消息文案配置，记住这个优先级是最低的，如果你的接口返回了 msg，接口返回的优先。
 *
 * @version 6.2.2
 */
class SchemaMessage extends BaseRenderer
{
    public function __construct()
    {
    }

    /**
     * 获取失败时的提示.
     * @param mixed $value
     */
    public function fetchFailed($value = '')
    {
        return $this->set('fetchFailed', $value);
    }

    /**
     * 获取成功的提示，默认为空。
     * @param mixed $value
     */
    public function fetchSuccess($value = '')
    {
        return $this->set('fetchSuccess', $value);
    }

    /**
     * 保存失败时的提示。
     * @param mixed $value
     */
    public function saveFailed($value = '')
    {
        return $this->set('saveFailed', $value);
    }

    /**
     * 保存成功时的提示。
     * @param mixed $value
     */
    public function saveSuccess($value = '')
    {
        return $this->set('saveSuccess', $value);
    }
}
