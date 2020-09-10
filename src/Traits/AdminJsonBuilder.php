<?php
declare(strict_types=1);
namespace Mzh\UI\Traits;


class AdminJsonBuilder implements \JsonSerializable
{

    protected $hideAttrs = [];

    public function jsonSerialize()
    {
        $data = null;
        $hide = collect($this->hideAttrs)->push("hideAttrs")->toArray();
        foreach ($this as $key => $val) {
            if (!in_array($key, $hide)) {
                $data[$key] = $val;
            }
        }
        return array_filter($data);
    }
    public function __toString():string
    {
        // TODO: Implement __toString() method.
        return json_encode($this->jsonSerialize(),JSON_UNESCAPED_UNICODE);
    }
}
