<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
 namespace HPlus\UI\Components\Grid;


use HPlus\UI\Components\GridComponent;

class Link extends GridComponent
{
    protected $componentName = "Link";
    protected $type;
    protected $underline;
    protected $disabled = false;
    protected $href;
    protected $icon;


    static public function make($value = null)
    {
        return new Link($value);
    }

    /**
     * 类型   success/info/warning/danger
     * @param string|array $type
     * @param bool $random
     * @return $this
     */
    public function type($type = null, $random = true)
    {
        $type = empty($type) ? ['primary', 'success', 'info', 'warning', 'danger'] : $type;

        $this->type = [
            'data' => $type,
            'random' => $random
        ];

        return $this;
    }

    /**
     * @param bool $underline
     * @return $this
     */
    public function underline($underline = true)
    {
        $this->underline = $underline;
        return $this;
    }

    /**
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled = true)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @param string $href
     * @return $this
     */
    public function href($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }


}
