<?php
declare(strict_types=1);

namespace HPlus\UI\Entity;

class MenuEntity
{
    /**
     * @var MenuItemEntity[]
     */
    public $menus;

    public function __construct($menus)
    {
        $menus = (array)$menus;
        foreach ($menus as $menu) {
            $this->setMenus($menu);
        }
    }

    /**
     * @return MenuItemEntity[]
     */
    public function getMenus()
    {
        return $this->menus;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        $menus = [];
        foreach ($this->menus as $menu) {
            $menus[] = $menu->toArray();
        }
        return $menus;
    }

    /**
     * @return array
     */
    public function toMenuList()
    {
        $menus = [];
        foreach ($this->menus as $menu) {
            $menus[] = $this->getItem($menu,$menus);
        }
        return $menus;
    }

    private function getItem(MenuItemEntity $menu, &$menus)
    {
        $menus[] = [
            'title' => $menu->getTitle(),
            'uri' => $menu->getUri(),
            'route' => $menu->getRoute()
        ];
        foreach ($menu->getChildren() as $child) {
            $menus[] = $this->getItem($child, $menus);
        }
        return $menus;
    }

    /**
     * @param mixed $menus
     */
    public function setMenus($menus): void
    {
        $this->menus[] = new MenuItemEntity($menus);
    }

}