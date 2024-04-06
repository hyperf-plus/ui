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

namespace HPlus\UI\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

#[Command]
class PublishAssets extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('ui:publish-assets');
    }

    public function configure(): void
    {
        parent::configure();
        $this->setDescription('发布静态资源');
    }

    public function handle()
    {
        $this->publishAssets();
        $this->info('success');
    }

    private function publishAssets()
    {
        $source = __DIR__ . '/../../admin-views/dist/';
        $target = BASE_PATH . '/public/admin';

        $this->copyDirectory($source, $target);
    }

    private function copyDirectory(string $source, string $target)
    {
        if (! is_dir($source)) {
            return;
        }

        if (! is_dir($target)) {
            mkdir($target, 0755, true);
        }

        # 复制目录

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                $dirPath = $target . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
                if (! is_dir($dirPath)) {
                    mkdir($dirPath);
                }
            } else {
                copy($item->getPathname(), $target . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            }
        }
    }
}
