<?php
declare(strict_types=1);

namespace HPlus\UI\Contract;

interface MenuInterface
{
    public function getId(): int;

    public function getTitle(): string;

    public function getIcon(): ?string;

    public function getUri(): string;

    public function getRoute(): string;

    public function children(): array;

    public function toArray(): array;

}