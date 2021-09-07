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

use HPlus\UI\Exception\BusinessException;
use Hyperf\Utils\Arr;
use HPlus\UI\Components\Component;
use HPlus\UI\Form;
use HPlus\UI\Form\FormItem;
use Hyperf\Filesystem\Version;

class Upload extends Component
{
    protected $componentName = "Upload";

    protected $type = "image";
    protected $action = "";
    protected $host = "";
    protected $multiple = false;
    protected $data = [];
    protected $showFileList = false;
    protected $drag = false;
    protected $accept;
    protected $listType = 'text';
    protected $disabled = false;
    protected $limit = 1;

    protected $width = 100;
    protected $height = 100;


    protected $keyName;
    protected $valueName;

    protected $remove_flag_name = Form::REMOVE_FLAG_NAME;

    public function __construct($value = null)
    {
        $this->action = route('/upload/image');
        $this->host = config('admin.upload.host', route('/'));
        $this->componentValue($value);
    }

    static public function make($value = null)
    {
        return new Upload($value);
    }

    public function destroy(FormItem $formItem)
    {
        $files = [];
        if (is_array($formItem->original)) {
            $files = $formItem->original;
        } else {
            $files[] = $formItem->original;
        }

        $storage = Storage()->getDriver();
        collect($files)->each(function ($file) use ($storage) {
            if (!empty($this->valueName)) {
                $file = $file[$this->valueName];
            }
            if (!empty($file)){
                $path = parse_url($file)['path'] ?? '';
                if (Version::isV2()) {
                    $storage->fileExists() && $storage->delete($path);
                } else {
                    $storage->has($path) && $storage->delete($path);
                }
            }
        });
    }

    /**
     * @param string $action
     * @return $this
     */
    public function action($action)
    {
        $this->action = $action;
        return $this;
    }


    /**
     * @param string $host
     * @return $this;
     */
    public function host(string $host)
    {
        $this->host = $host;
        return $this;
    }


    /**
     * @param bool $multiple
     * @param null|string $keyName
     * @param null|string $valueName
     * @return $this
     */
    public function multiple(bool $multiple = true, $keyName = null, $valueName = null)
    {
        $this->multiple = $multiple;
        $this->keyName = $keyName;
        $this->valueName = $valueName;
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function data($data)
    {

        foreach ($data as $key => $value) {
            $this->data = Arr::set($this->data, $key, $value);
        }

        return $this;
    }

    /**
     * 文件保存目录
     * @param $path
     * @return $this
     */
    public function path($path)
    {
        $this->data = Arr::set($this->data, "path", $path);
        return $this;
    }

    /**
     * 自动生成文件名
     * @return $this
     */
    public function uniqueName()
    {
        $this->data = Arr::set($this->data, "uniqueName", true);
        return $this;
    }

    /**
     * @param bool $drag
     * @return $this
     */
    public function drag(bool $drag = true)
    {
        $this->drag = $drag;
        return $this;
    }

    /**
     * @param string $accept
     * @return $this
     */
    public function accept($accept)
    {
        $this->accept = $accept;
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
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return $this;
     */
    public function image()
    {
        $this->type = "image";
        return $this;
    }

    public function avatar()
    {
        $this->type = "avatar";
        return $this;
    }

    public function file()
    {
        $this->type = "file";
        $this->action = route('/upload/file');
        return $this;
    }

    /**
     * @param int $width
     * @return $this
     */
    public function width(int $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int $height
     * @return $this
     */
    public function height(int $height)
    {
        $this->height = $height;
        return $this;
    }


}
