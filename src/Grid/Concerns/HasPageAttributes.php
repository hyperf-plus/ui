<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Concerns;


trait HasPageAttributes
{
    protected $pageSizes = [10, 15, 20, 30, 50, 100];
    protected $perPage = 15;

    protected $pageLayout = "total, sizes,->,prev, pager, next, jumper";

    protected $pageBackground = true;

    protected $hidePage = false;

    /**
     * 设置分页布局，子组件名用逗号分隔
     * prev, pager, next, jumper, ->, total
     * @param string $layout
     * @return $this
     */
    public function pageLayout(string $layout)
    {
        $this->pageLayout = $layout;
        return $this;
    }


    /**
     * 每页显示个数选择器的选项设置
     * @param array $sizes
     * @return $this
     */
    public function pageSizes($sizes)
    {
        $this->pageSizes = $sizes;

        return $this;
    }

    /**
     * 每页显示条目个数
     * @param int $perPage
     * @return $this
     */
    public function perPage($perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * 是否为分页按钮添加背景色
     * @param bool $pageBackground
     * @return $this
     */
    public function pageBackground(bool $pageBackground = true)
    {
        $this->pageBackground = $pageBackground;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return bool
     */
    public function isHidePage(): bool
    {
        return $this->hidePage;
    }

    /**
     * 隐藏分页
     * @return $this
     */
    public function hidePage()
    {
        $this->hidePage = true;
        if ($this->model) {
            $this->model->usePaginate(false);
        }
        return $this;
    }


}
