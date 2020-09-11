<?php
declare(strict_types=1);

namespace HPlus\UI\Entity;

class UISettingEntity extends EntityBean
{
    /**
     * 本地模式
     * @var bool
     */
    public $isLocal = false;
    /**
     * 显示logo
     * @var bool
     */
    public $logoShow = true;
    /**
     * Logo地址
     * @var string
     */
    public $logo = '';
    /**
     * logo高度
     * @var string
     */
    public $logoLight = '';

    /**
     * 小logo地址
     * @var string
     */
    public $logoMini = '';
    /**
     * 小logo高度
     * @var string
     */
    public $logoMiniLight = '';
    /**
     * 站点名称
     * @var string
     */
    public $name = '';
    /**
     * 版权信息
     * @var string
     */
    public $copyright = "Copyright © 2020 HPlus";
    /**
     * 底部链接
     * @var array
     */
    public $footerLinks = [];
    /**
     * 多标签
     * @var bool
     */
    public $uniqueOpened = false;
    /**
     * 当前登录用户信息
     * @var UserEntity
     */
    public $user = [];
    /**
     * 菜单数据
     * @var MenuEntity
     */
    public $menu = [];
    /**
     * 菜单数据
     * @var array
     */
    public $menuList = [];
    /**
     * 头部URL链接列表
     * @var array[]
     */
    public $url = [];

    /**
     * API根地址
     * @var string
     */
    public $apiRoot = '';

    /**
     * @return bool
     */
    public function isLocal(): bool
    {
        return $this->isLocal;
    }

    /**
     * @param bool $isLocal
     */
    public function setIsLocal(bool $isLocal): void
    {
        $this->isLocal = $isLocal;
    }

    /**
     * @return bool
     */
    public function isLogoShow(): bool
    {
        return $this->logoShow;
    }

    /**
     * @param bool $logoShow
     */
    public function setLogoShow(bool $logoShow): void
    {
        $this->logoShow = $logoShow;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getLogoLight(): string
    {
        return $this->logoLight;
    }

    /**
     * @param string $logoLight
     */
    public function setLogoLight(string $logoLight): void
    {
        $this->logoLight = $logoLight;
    }

    /**
     * @return string
     */
    public function getLogoMini(): string
    {
        return $this->logoMini;
    }

    /**
     * @param string $logoMini
     */
    public function setLogoMini(string $logoMini): void
    {
        $this->logoMini = $logoMini;
    }

    /**
     * @return string
     */
    public function getLogoMiniLight(): string
    {
        return $this->logoMiniLight;
    }

    /**
     * @param string $logoMiniLight
     */
    public function setLogoMiniLight(string $logoMiniLight): void
    {
        $this->logoMiniLight = $logoMiniLight;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCopyright(): string
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     */
    public function setCopyright(string $copyright): void
    {
        $this->copyright = $copyright;
    }

    /**
     * @return array
     */
    public function getFooterLinks(): array
    {
        return $this->footerLinks;
    }

    /**
     * @param array $footerLinks
     */
    public function setFooterLinks(array $footerLinks): void
    {
        $this->footerLinks = $footerLinks;
    }

    /**
     * @param UserEntity $user
     * @return UISettingEntity
     */
    public function setUser(UserEntity $user): UISettingEntity
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return array
     */
    public function getMenu(): MenuEntity
    {
        return $this->menu;
    }

    /**
     * @param MenuEntity $menu
     */
    public function setMenu(MenuEntity $menu): void
    {
        $this->menu = $menu->toArray();
        $this->menuList = $menu->toMenuList();
    }

    /**
     * @return array
     */
    public function getMenuList(): array
    {
        return $this->menuList;
    }

    /**
     * @return bool
     */
    public function isUniqueOpened(): bool
    {
        return $this->uniqueOpened;
    }

    /**
     * @param bool $uniqueOpened
     */
    public function setUniqueOpened(bool $uniqueOpened): void
    {
        $this->uniqueOpened = $uniqueOpened;
    }

    /**
     * @param array $url
     * @return UISettingEntity
     */
    public function setUrl(array $url): UISettingEntity
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiRoot(): string
    {
        return $this->apiRoot;
    }

    /**
     * @param string $apiRoot
     */
    public function setApiRoot(string $apiRoot): void
    {
        $this->apiRoot = $apiRoot;
    }

    /**
     * @return UserEntity
     */
    public function getUser(): UserEntity
    {
        return $this->user;
    }
}