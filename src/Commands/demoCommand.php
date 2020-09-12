<?php

namespace HPlus\UI\Commands;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\DbConnection\Db;
use Phper666\GenerateFile\GenerateFile;

/**
 * Class InstallCommand
 * @Command()
 * @package App\Install
 */
class demoCommand extends HyperfCommand
{
    protected $name = 'gen:ui-demo';

    protected function configure()
    {
        $this->setDescription('create ui demo.');
    }

    public function handle()
    {
        $content = file_get_contents(__DIR__ . '/stubs/UiController.stub');
        file_put_contents(BASE_PATH . '/app/Controller/UiController.php', $content);
        $this->output->success('create success!');
        $this->output->success('启动服务后访问：http://127.0.0.1:9501/ui/index#/ui/button');
        $this->output->success('更多文档请参阅:https://doc.hyperf.plus');
        return;
    }
}