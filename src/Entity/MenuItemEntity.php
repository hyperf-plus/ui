<?php
declare(strict_types=1);

namespace HPlus\UI\Entity;

class MenuItemEntity extends EntityBean
{
    public $id;
    public $title;
    public $icon;
    public $uri;
    public $route;
    /**
     * @var MenuItemEntity[]
     */
    public $children = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function children(): array
    {
        return $this->children;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route): void
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    public function setChildren(array $children): void
    {
        foreach ($children as $child){
            $this->children[] = new static($child);
        }
    }
}