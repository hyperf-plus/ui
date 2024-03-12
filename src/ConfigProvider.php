<?php

declare(strict_types=1);
namespace HPlus\UI;

/**
 * This file is part of ai-image.
 *
 * @contact  4213509@qq.com
 */


class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__.'/Controller',
                    ],
                ],
            ],
        ];
    }
}
