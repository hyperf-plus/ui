<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */


namespace Mzh\UI;

use Hyperf\Config\Annotation\Value;
use Hyperf\Filesystem\FilesystemFactory;
class StorageFactory
{

    /**
     * @var FilesystemFactory
     */
    protected $factory;

    /**
     * @var string
     */
    protected $disk = 'local';

    /**
     * Storage constructor.
     * @param FilesystemFactory $factory
     */
    public function __construct(FilesystemFactory $factory)
    {
        $this->factory = $factory;
    }

    public function disk($disk)
    {
        if ($disk == ''){
            $disk = config('admin.upload.disk');
        }
        $this->disk = $disk;
        return $this;
    }

    /**
     * @return \League\Flysystem\Filesystem
     */
    public function getDriver()
    {
        return $this->factory->get($this->disk);
    }

    public function route(string $file_name)
    {
        return route($file_name);
    }
}