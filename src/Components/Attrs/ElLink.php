<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Components\Attrs;


trait ElLink
{
    protected $type = "default";
    protected $underline = false;
    protected $disabled = false;
    protected $href;
    protected $icon;

    /**
     * @param string $type
     * @return $this
     */
    public function type(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool $underline
     * @return $this
     */
    public function underline(bool $underline = true)
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
     * @param mixed $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }


}
