<?php
declare(strict_types=1);
namespace Mzh\UI;

use Mzh\UI\Contracts\AuthInterface;
use Mzh\UI\Library\Auth;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__
                    ],
                ],
            ]
        ];
    }
}
