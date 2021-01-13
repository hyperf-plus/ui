<?php
declare(strict_types=1);

namespace HPlus\UI;

use HPlus\UI\Contracts\AuthInterface;
use HPlus\UI\Library\Auth;

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
