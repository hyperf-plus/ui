<?php

namespace HPlus\UI\Commands;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Phper666\GenerateFile\GenerateFile;

/**
 * Class InstallCommand
 * @Command()
 * @package App\Install
 */
class updateCommand extends HyperfCommand
{
    protected $name = 'ui:update';

    protected function configure()
    {
        $this->setDescription('ui plus publish.');
    }

    /**
     * @todo
     * 暂未实现
     */

    public function handle()
    {
        $server_conf = config('server');
        $enable_static = $server_conf['settings']['enable_static_handler'] ?? false;
        $public_dir = $server_conf['settings']['document_root'] ?? '';
        if (!$server_conf || !$enable_static || !$public_dir) {
            $this->output->warning('
要启用服务器静态文件处理，请参阅：
To enable server static file processing, please refer to:
             https://hyperf.wiki/2.0/#/zh-cn/filesystem?id=%e9%85%8d%e7%bd%ae%e9%9d%99%e6%80%81%e8%b5%84%e6%ba%90
配置完成后请再次执行 php bin/hyperf.php ui:init 进行初始化
             ');
            return;
        }
        if (is_dir(BASE_PATH . "/resources/ui")) {
            $this->output->warning('您的vue文件已经存在，请手动将' . realpath(__DIR__ . '/../../resources') . '目录拷贝到' . realpath(BASE_PATH . '/resources') . " 目录下，注意修改的文件请自行备份处理");
            $this->output->text('更多文档请参阅:https://doc.hyperf.plus');
        }
        $gf = new GenerateFile();
        $gf->setReplaceDir(__DIR__ . '/../../public') // 设置处理的目录
        ->setNewProjectDir(BASE_PATH . "/public/static")
            ->setReplaceFileName(false)
            ->setReplaceFileExt(['*']) // 设置支持替换文件的后缀，默认替换项目下的所有的文件
            ->run();
        $this->output->success('静态资源更新成功');
        $this->output->text('更多文档请参阅:https://doc.hyperf.plus');
        return;
    }
}