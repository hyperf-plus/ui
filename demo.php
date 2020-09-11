<?php

declare(strict_types=1);

namespace App\Controller;

use HPlus\UI\Components\Antv\Area;
use HPlus\UI\Components\Antv\Column;
use HPlus\UI\Components\Antv\Line;
use HPlus\UI\Components\Antv\StepLine;
use HPlus\UI\Components\Widgets\Alert;
use HPlus\UI\Components\Widgets\Card;
use HPlus\UI\Entity\MenuEntity;
use HPlus\UI\Entity\MenuItemEntity;
use HPlus\UI\Entity\UISettingEntity;
use HPlus\UI\Entity\UserEntity;
use HPlus\UI\Layout\Content;
use HPlus\UI\Layout\Row;
use HPlus\UI\UI;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class IndexController
 * @AutoController()
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    public function index()
    {
        #创建测试菜单
        $menuList = [
            [
                "id" => 2,
                "parent_id" => 0,
                "is_menu" => 1,
                "order" => 0,
                "title" => "系统",
                "icon" => "el-icon-setting",
                "uri" => "system",
                "route" => "/index",
                "children" => [
                    [
                        "id" => 2,
                        "parent_id" => 0,
                        "order" => 0,
                        "title" => "测试1",
                        "icon" => "el-icon-setting",
                        "uri" => "system",
                        "route" => "/index/system"
                    ], [
                        "id" => 3,
                        "parent_id" => 0,
                        "order" => 0,
                        "title" => "测试2",
                        "icon" => "el-icon-setting",
                        "uri" => "system",
                        "route" => "/index/test"
                    ],
                ]
            ]
        ];
        $menu = new MenuEntity($menuList);

        # 可以用以上方法添加，也可以用对象方式添加
        $user = new UserEntity();
        $menuItem = new MenuItemEntity();
        $menuItem->setIcon('el-icon');
        $menuItem->setRoute('/index/test');
        $menuItem->setTitle('测试3');
        $menu->addMenu($menuItem);
        # ....添加更多
        //创建测试用户信息
        $user = new UserEntity();
        $user->setId(1);
        $user->setUsername('admin');
        $user->setName('毛自豪');
        $user->setAvatar('https://wx.qlogo.cn/mmopen/vi_32/ajNVdqHZLLBpqXMk6kUC4PeB5VrIVtHyUqrcPg65sjKdPxlkBINiaQ1NG6nZC9iaWOh9qdO6VaApJzgWA1wu5h8Q/132');

        #创建UI配置文件
        $setting = new UISettingEntity();
        #设置用户信息
        $setting->setUser($user);
        #设置菜单信息
        $setting->setMenu($menu);

        #设置底部链接
        $setting->setUrl([
            'logout' => route('admin/logout'),
            'setting' => route('admin/setting')
        ]);
        return UI::view($setting);
    }


    public function system()
    {
        $content = new Content();
        $content->className('m-10')
            ->row(function (Row $row) {
                $row->gutter(10);
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 hyperf-admin")->showIcon()->closable(false)->type("success"));
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 hyperf-admin")->showIcon()->closable(false)->type("error"));
            })->row(function (Row $row) {
                $row->gutter(10);
                $row->className('mt-10');
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 hyperf-admin")->showIcon()->closable(false)->type("info"));
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 hyperf-admin")->showIcon()->closable(false)->type("warning"));
            })->row(function (Row $row) {
                $row->gutter(10)->className('mt-10');
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Line::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红',
                                    'value' => rand(100, 1000)
                                ]);
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小白',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '折线图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '他们最常用于表现趋势和关系，而不是传达特定的值。',
                                ],
                                'seriesField' => 'type',
                                'smooth' => true,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Area::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小白面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '面积图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '他们最常用于表现趋势和关系，而不是传达特定的值。',
                                ],
                                'seriesField' => 'type',
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
            })->row(function (Row $row) {
                $row->gutter(10)->className('mt-10');
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    StepLine::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '阶梯图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '阶梯线图用于表示连续时间跨度内的数据',
                                ],
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Column::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '条形图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '条形图即是横向柱状图，相比基础柱状图，条形图的分类文本可以横向排布，因此适合用于分类较多的场景',
                                ],
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
            });
        return $content;
    }

    public function test()
    {
        $content = new Content();
        $content->showHeader()->title('测试')->body(Alert::make()->type('error')
            ->title('这里是警告信息')
            ->description('我是提示消息哈哈哈')
        );
        return $content;
    }
}
