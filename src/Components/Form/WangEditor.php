<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Components\Form;


use HPlus\UI\Components\Component;

class WangEditor extends Component
{

    protected $componentName = 'WangEditor';

    protected $menus = [
        'head',
        'bold',
        'fontSize',
        'fontName',
        'italic',
        'underline',
        'strikeThrough',
        'indent',
        'lineHeight',
        'foreColor',
        'backColor',
        'link',
        'list',
        'todo',
        'justify',
        'quote',
        'emoticon',
        'image',
        'video',
        'table',
        'code',
        'splitLine',
        'undo',
        'redo'
    ];

    protected $zIndex = 0;

    protected $uploadImgShowBase64 = false;

    protected $uploadImgServer;

    protected $uploadFileName;

    protected $uploadImgHeaders;

    protected $component;

    protected $showFullScreen = true;
    /**
     * 开启html、word样式过滤
     * @var bool
     */
    protected $pasteFilterStyle = true;

    static public function make($value = null)
    {
        return new Wangeditor($value);
    }

    /**
     * 自定义菜单
     * @param array $menus
     * @return $this
     */
    public function menus(array $menus)
    {
        $this->menus = $menus;
        return $this;
    }

    /**
     * 关闭样式过滤
     * @param bool $showFullScreen
     * @return $this
     */
    public function pasteFilterStyle(bool $pasteFilterStyle = false)
    {
        $this->pasteFilterStyle = $pasteFilterStyle;
        return $this;
    }

    /**
     * 开启全屏按钮
     * @param bool $showFullScreen
     * @return $this
     */
    public function showFullScreen(bool $showFullScreen = true)
    {
        $this->showFullScreen = $showFullScreen;
        return $this;
    }

    /**
     * 编辑区域的 z-index
     * @param int $zIndex
     * @return $this
     */
    public function zIndex(int $zIndex)
    {
        $this->zIndex = $zIndex;
        return $this;
    }

    /**
     * 使用 base64 保存图片
     * @param bool $uploadImgShowBase64
     * @return $this
     */
    public function uploadImgShowBase64(bool $uploadImgShowBase64 = true)
    {
        $this->uploadImgShowBase64 = $uploadImgShowBase64;
        return $this;
    }

    /**
     * 配置服务器端地址
     * @param string $uploadImgServer
     * @return $this
     */
    public function uploadImgServer(string $uploadImgServer)
    {
        $this->uploadImgServer = $uploadImgServer;
        return $this;
    }

    /**
     * 自定义 fileName
     * @param mixed $uploadFileName
     * @return WangEditor
     */
    public function uploadFileName(string $uploadFileName)
    {
        $this->uploadFileName = $uploadFileName;
        return $this;
    }

    /**
     * 自定义 header
     * @param mixed $uploadImgHeaders
     * @return WangEditor
     */
    public function uploadImgHeaders(array $uploadImgHeaders)
    {
        $this->uploadImgHeaders = $uploadImgHeaders;
        return $this;
    }

    /**
     * @param mixed $component
     * @return WangEditor
     */
    public function component($component)
    {
        $this->component = $component;
        return $this;
    }


}
