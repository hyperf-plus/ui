<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Traits;


class AdminJsonBuilder implements \JsonSerializable
{

    protected $hideAttrs = [];

    public function jsonSerialize()
    {
        $data = null;
        $hide = collect($this->hideAttrs)->push("hideAttrs")->toArray();
        foreach ($this as $key => $val) {
            if (!in_array($key, $hide) && $val !== null) {
                $data[$key] = $val;
            }
        }
        return $data;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return json_encode($this->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    }
}
