<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace Mzh\UI\Traits;


use Hyperf\Utils\Str;

trait Resizable
{
    /**
     * Method for returning specific thumbnail for model.
     *
     * @param string $type
     * @param string $attribute
     *
     * @return string
     */
    public function thumbnail($type, $attribute = 'image')
    {
        // Return empty string if the field not found
        if (!isset($this->attributes[$attribute])) {
            return '';
        }

        // We take image from posts field
        $image = $this->attributes[$attribute];

        $thumbnail = $this->getThumbnail($image, $type);

        return Storage()->disk(config('admin.upload.disk'))->getDriver()->has($thumbnail) ? $thumbnail : $image;
    }

    /**
     * Generate thumbnail URL.
     *
     * @param $image
     * @param $type
     *
     * @return string
     */
    public function getThumbnail($image, $type)
    {
        // We need to get extension type ( .jpeg , .png ...)
        $ext = pathinfo($image, PATHINFO_EXTENSION);

        // We remove extension from file name so we can append thumbnail type
        $name = Str::replaceLast('.'.$ext, '', $image);

        // We merge original name + type + extension
        return $name.'-'.$type.'.'.$ext;
    }
}
