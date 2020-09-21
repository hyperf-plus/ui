<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 *
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/hyperf/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI\Entity;

class UISettingEntity extends EntityBean
{
    /**
     * 本地模式.
     * @var bool
     */
    public $isLocal = false;

    /**
     * 显示logo.
     * @var bool
     */
    public $logoShow = true;

    /**
     * Logo地址
     * @var string
     */
    public $logo = '';

    /**
     * logo高度.
     * @var string
     */
    public $logoLight = '';

    /**
     * 小logo地址
     * @var string
     */
    public $logoMini = '';

    /**
     * 小logo高度.
     * @var string
     */
    public $logoMiniLight = '';

    /**
     * 站点名称.
     * @var string
     */
    public $name = '';

    /**
     * 浏览器title.
     * @var string
     */
    public $title = 'HPlus Admin 后台管理系统';

    /**
     * 版权信息.
     * @var string
     */
    public $copyright = 'Copyright © 2020 HPlus';

    /**
     * 底部链接.
     * @var array
     */
    public $footerLinks = [];

    /**
     * 多标签.
     * @var bool
     */
    public $uniqueOpened = false;

    /**
     * 当前登录用户信息.
     * @var UserEntity
     */
    public $user = [];

    /**
     * 菜单数据.
     * @var MenuEntity
     */
    public $menu = [];

    /**
     * 菜单数据.
     * @var array
     */
    public $menuList = [];

    /**
     * 头部URL链接列表.
     * @var array[]
     */
    public $url = [];

    /**
     * 默认首页.
     * @var string
     */
    public $homeUrl = 'index';

    /**
     * API根地址
     * @var string
     */
    public $apiRoot = '';

    public function isLocal(): bool
    {
        return $this->isLocal;
    }

    public function setIsLocal(bool $isLocal): void
    {
        $this->isLocal = $isLocal;
    }

    public function isLogoShow(): bool
    {
        return $this->logoShow;
    }

    public function setLogoShow(bool $logoShow): void
    {
        $this->logoShow = $logoShow;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    public function getLogoLight(): string
    {
        return $this->logoLight;
    }

    public function setLogoLight(string $logoLight): void
    {
        $this->logoLight = $logoLight;
    }

    public function getLogoMini(): string
    {
        return $this->logoMini;
    }

    public function setLogoMini(string $logoMini): void
    {
        $this->logoMini = $logoMini;
    }

    public function getLogoMiniLight(): string
    {
        return $this->logoMiniLight;
    }

    public function setLogoMiniLight(string $logoMiniLight): void
    {
        $this->logoMiniLight = $logoMiniLight;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCopyright(): string
    {
        return $this->copyright;
    }

    public function setCopyright(string $copyright): void
    {
        $this->copyright = $copyright;
    }

    public function getFooterLinks(): array
    {
        return $this->footerLinks;
    }

    public function setFooterLinks(array $footerLinks): void
    {
        $this->footerLinks = $footerLinks;
    }

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

    public function setMenu(MenuEntity $menu): void
    {
        $this->menu = $menu->toArray();
        $this->menuList = $menu->toMenuList();
    }

    public function getMenuList(): array
    {
        return $this->menuList;
    }

    public function isUniqueOpened(): bool
    {
        return $this->uniqueOpened;
    }

    public function setUniqueOpened(bool $uniqueOpened): void
    {
        $this->uniqueOpened = $uniqueOpened;
    }

    public function setUrl(array $url): UISettingEntity
    {
        $this->url = $url;
        return $this;
    }

    public function getApiRoot(): string
    {
        return $this->apiRoot;
    }

    public function setApiRoot(string $apiRoot): void
    {
        $this->apiRoot = $apiRoot;
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }

    public function getHomeUrl(): string
    {
        return $this->homeUrl;
    }

    public function setHomeUrl(string $homeUrl): void
    {
        $this->homeUrl = $homeUrl;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
