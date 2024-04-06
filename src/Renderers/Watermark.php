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
 * Watermark.
 *
 * @version 6.2.2
 */
class Watermark extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'custom-watermark');
    }

    /**
     * 内容.
     * @param mixed $value
     */
    public function body($value = '')
    {
        return $this->set('body', $value);
    }

    /**
     * 设置类名.
     * @param mixed $value
     */
    public function className($value = '')
    {
        return $this->set('className', $value);
    }

    /**
     * 水印文字内容.
     * @param mixed $value
     */
    public function content($value = '')
    {
        return $this->set('content', $value);
    }

    /**
     * 文字样式.
     * @param mixed $value
     */
    public function font($value = '')
    {
        return $this->set('font', $value);
    }

    /**
     * 水印之间的间距, 默认: [100, 100].
     * @param mixed $value
     */
    public function gap($value = '')
    {
        return $this->set('gap', $value);
    }

    /**
     * 水印的高度，content 的默认值为自身的高度, 默认: 64.
     * @param mixed $value
     */
    public function height($value = '')
    {
        return $this->set('height', $value);
    }

    /**
     * 图片源，建议导出 2 倍或 3 倍图，优先级高 (支持 base64 格式).
     * @param mixed $value
     */
    public function image($value = '')
    {
        return $this->set('image', $value);
    }

    /**
     * 是否将水印传导给弹出组件如 Modal、Drawer.
     * @param mixed $value
     */
    public function inherit($value = true)
    {
        return $this->set('inherit', $value);
    }

    /**
     * 水印距离容器左上角的偏移量，默认为 gap/2.
     * @param mixed $value
     */
    public function offset($value = '')
    {
        return $this->set('offset', $value);
    }

    /**
     * 水印绘制时，旋转的角度，单位 °, 默认: -22.
     * @param mixed $value
     */
    public function rotate($value = '')
    {
        return $this->set('rotate', $value);
    }

    /**
     * 指定为 watermark 渲染器。文档: https://ant-design.antgroup.com/components/watermark-cn#watermark.
     * @param mixed $value
     */
    public function type($value = 'custom-watermark')
    {
        return $this->set('type', $value);
    }

    /**
     * 水印的宽度，content 的默认值为自身的宽度, 默认: 120.
     * @param mixed $value
     */
    public function width($value = '')
    {
        return $this->set('width', $value);
    }

    /**
     * 追加的水印元素的 z-index, 默认: 9.
     * @param mixed $value
     */
    public function zIndex($value = '')
    {
        return $this->set('zIndex', $value);
    }
}
