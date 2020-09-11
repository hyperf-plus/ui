<?php

declare(strict_types=1);

namespace App\Controller;

use HPlus\UI\Components\Antv\Area;
use HPlus\UI\Components\Antv\Column;
use HPlus\UI\Components\Antv\Line;
use HPlus\UI\Components\Antv\StepLine;
use HPlus\UI\Components\Attrs\SelectOption;
use HPlus\UI\Components\Form\Checkbox;
use HPlus\UI\Components\Form\CheckboxGroup;
use HPlus\UI\Components\Form\ColorPicker;
use HPlus\UI\Components\Form\CSwitch;
use HPlus\UI\Components\Form\DatePicker;
use HPlus\UI\Components\Form\DateTimePicker;
use HPlus\UI\Components\Form\IconChoose;
use HPlus\UI\Components\Form\Input;
use HPlus\UI\Components\Form\InputNumber;
use HPlus\UI\Components\Form\Radio;
use HPlus\UI\Components\Form\RadioGroup;
use HPlus\UI\Components\Form\Rate;
use HPlus\UI\Components\Form\Select;
use HPlus\UI\Components\Form\Slider;
use HPlus\UI\Components\Form\TimePicker;
use HPlus\UI\Components\Form\Upload;
use HPlus\UI\Components\Form\WangEditor;
use HPlus\UI\Components\Grid\Avatar;
use HPlus\UI\Components\Grid\Image;
use HPlus\UI\Components\Widgets\Alert;
use HPlus\UI\Components\Widgets\Button;
use HPlus\UI\Components\Widgets\Card;
use HPlus\UI\Components\Widgets\Dialog;
use HPlus\UI\Components\Widgets\Html;
use HPlus\UI\Components\Widgets\Markdown;
use HPlus\UI\Components\Widgets\Text;
use HPlus\UI\Entity\MenuEntity;
use HPlus\UI\Entity\MenuItemEntity;
use HPlus\UI\Entity\UISettingEntity;
use HPlus\UI\Entity\UserEntity;
use HPlus\UI\Form;
use HPlus\UI\Form\FormActions;
use HPlus\UI\Grid;
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
        $menuItem->setIcon('el-icon-setting');
        $menuItem->setRoute('/index/button');
        $menuItem->setUri('/index/button');
        $menuItem->setTitle('各种按钮');
        $menu->addMenu($menuItem);

        $menuItem = new MenuItemEntity();
        $menuItem->setIcon('el-icon-setting');
        $menuItem->setRoute('/index/form');
        $menuItem->setUri('/index/form');
        $menuItem->setTitle('各种表单');
        $menu->addMenu($menuItem);

        $menuItem = new MenuItemEntity();
        $menuItem->setIcon('el-icon-setting');
        $menuItem->setRoute('/index/layout');
        $menuItem->setUri('/index/layout');
        $menuItem->setTitle('各种布局');
        $menu->addMenu($menuItem);

        $menuItem = new MenuItemEntity();
        $menuItem->setIcon('el-icon-setting');
        $menuItem->setRoute('/index/grid');
        $menuItem->setUri('/index/layout');
        $menuItem->setTitle('表格数据交互');
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

    public function button()
    {
        $content = new Content();
        $content->className('m-15');
        $content->row($this->code());
        $content->row($this->br());
        $content->row(Card::make()->header("基础用法")->content(function (Content $content) {
            $content->row(function (Row $row) {
                $row->item(Button::make("默认按钮")->type('default'));
                $row->item(Button::make("主要按钮"));
                $row->item(Button::make("成功按钮")->type('success'));
                $row->item(Button::make("信息按钮")->type('info'));
                $row->item(Button::make("警告按钮")->type('warning'));
                $row->item(Button::make("危险按钮")->type('danger'));
            });
            $content->row($this->br());
            $content->row(function (Row $row) {
                $row->item(Button::make("朴素按钮")->type('default')->plain());
                $row->item(Button::make("主要按钮")->plain());
                $row->item(Button::make("成功按钮")->type('success')->plain());
                $row->item(Button::make("信息按钮")->type('info')->plain());
                $row->item(Button::make("警告按钮")->type('warning')->plain());
                $row->item(Button::make("危险按钮")->type('danger')->plain());
            });
            $content->row($this->br());
            $content->row(function (Row $row) {
                $row->item(Button::make("圆角按钮")->type('default')->round());
                $row->item(Button::make("主要按钮")->round());
                $row->item(Button::make("成功按钮")->type('success')->round());
                $row->item(Button::make("信息按钮")->type('info')->round());
                $row->item(Button::make("警告按钮")->type('warning')->round());
                $row->item(Button::make("危险按钮")->type('danger')->round());
            });
            $content->row($this->br());
            $content->row(function (Row $row) {
                $row->item(Button::make()->type('default')->icon('el-icon-search')->circle()->size('medium'));
                $row->item(Button::make()->icon('el-icon-edit')->circle());
                $row->item(Button::make()->type('success')->icon('el-icon-check')->circle());
                $row->item(Button::make()->type('info')->icon('el-icon-message')->circle());
                $row->item(Button::make()->type('warning')->icon('el-icon-star-off')->circle());
                $row->item(Button::make()->type('danger')->icon('el-icon-delete')->circle());
            });
        }));
        $content->row($this->br());

        $content->row(Card::make()->header("禁用状态")->content(function (Content $content) {
            $content->row(function (Row $row) {
                $row->item(Button::make("默认按钮")->type('default')->disabled());
                $row->item(Button::make("主要按钮")->disabled());
                $row->item(Button::make("成功按钮")->type('success')->disabled());
                $row->item(Button::make("信息按钮")->type('info')->disabled());
                $row->item(Button::make("警告按钮")->type('warning')->disabled());
                $row->item(Button::make("危险按钮")->type('danger')->disabled());
            });
            $content->row($this->br());
            $content->row(function (Row $row) {
                $row->item(Button::make("朴素按钮")->type('default')->plain()->disabled());
                $row->item(Button::make("主要按钮")->plain()->disabled());
                $row->item(Button::make("成功按钮")->type('success')->plain()->disabled());
                $row->item(Button::make("信息按钮")->type('info')->plain()->disabled());
                $row->item(Button::make("警告按钮")->type('warning')->plain()->disabled());
                $row->item(Button::make("危险按钮")->type('danger')->plain()->disabled());
            });
        }));

        $content->row($this->br());

        $content->row(Card::make()->header("文字按钮")->content(function (Content $content) {
            $content->row(function (Row $row) {
                $row->item(Button::make("文字按钮")->type('text'));
                $row->item(Button::make("文字按钮")->type('text')->disabled());
            });
        }));

        $content->row($this->br());

        $content->row(Card::make()->header("不同尺寸")->content(function (Content $content) {
            $content->row(function (Row $row) {
                $row->item(Button::make("默认按钮")->type('default')->size('default'));
                $row->item(Button::make("中等按钮")->type('default')->size('medium'));
                $row->item(Button::make("小型按钮")->type('default')->size('small'));
                $row->item(Button::make("超小按钮")->type('default')->size('mini'));
            });
            $content->row($this->br());
            $content->row(function (Row $row) {
                $row->item(Button::make("默认按钮")->type('default')->round()->size('default'));
                $row->item(Button::make("中等按钮")->type('default')->round()->size('medium'));
                $row->item(Button::make("小型按钮")->type('default')->round()->size('small'));
                $row->item(Button::make("超小按钮")->type('default')->round()->size('mini'));
            });
        }));

        $content->row($this->br());

        $content->row(Card::make()->header("事件处理")->content(function (Content $content) {
            $this->handler($content);
            $content->row($this->br());
            $content->row($this->code("弹窗按钮", "DialogButton"));
            $content->row($this->br());


            $content->row(function (Row $row) {
                $data = <<<JS
ref.attrs.disabled= !_this.attrs.disabled;
JS;
                $row->item(Button::make("改变弹窗按钮属性")->tooltip("这里改变的是弹窗按钮的attrs，修改的是props")->refData("DialogButton", $data));
                $data = <<<JS
ref.dialogTableVisible= !_this.dialogTableVisible;
JS;
                $row->item(Button::make("跨组件调用")->tooltip("这里改变的是弹窗按钮的组件data")->refData("DialogButton", $data));

                $url = route('demo/request');
                $data = <<<JS
ref.loading = true;
ref.axios.get("$url").then(res=>{
    console.log(res);
    ref.attrs.content = res.message
    ref.attrs.disable = true
    ref.loading = false;
});
JS;

                $row->item(Button::make("在组件内注入逻辑")->refData("logic", $data));
                $row->item(Button::make("我是被注入逻辑的组件")->type('danger')->ref('logic'));
            });

        }));
        return $content;
    }


    protected function handler(Content $content)
    {
        $content->row(function (Row $row) {
            $row->item(Button::make("路由跳转")->handler(Button::HANDLER_ROUTE)->uri('/home')->tooltip("跳转到首页"));
            $row->item(Button::make("链接跳转")->handler(Button::HANDLER_LINK)->uri('https://laravel-vue-admin.com')->message("是否要跳转？"));
            $row->item(Button::make("异步请求")->handler(Button::HANDLER_REQUEST)->uri(route('demo/request')));
            $row->item(function () {
                return Button::make("异步请求-请求前触发事件")
                    ->type("info")
                    ->handler(Button::HANDLER_REQUEST)
                    ->uri(route('demo/request'))
                    ->beforeEmit("message", ["type" => "info", "message" => "请求前触发的事件消息"]);
            });
            $row->item(function () {
                return Button::make("异步请求-请求成功触发事件")
                    ->type("success")
                    ->handler(Button::HANDLER_REQUEST)
                    ->uri(route('demo/request'))
                    ->successEmit("message", ["type" => "success", "message" => "请求成功触发事件"]);
            });
            $row->item(function () {
                return Button::make("异步请求-请求完成触发事件")
                    ->type("default")
                    ->tooltip("不管成功还是失败都会触发")
                    ->handler(Button::HANDLER_REQUEST)
                    ->uri(route('demo/request', ['error' => true]))
                    ->afterEmit("message", ["type" => "info", "message" => "请求完成触发事件"]);
            });
        });
    }

    protected function br()
    {
        return Html::make()->html("<br>");
    }

    protected function code($name = "查看源代码", $ref = "codeButton")
    {
        return Button::make($name)->ref($ref)->dialog(function (Dialog $dialog) use ($name) {
            $dialog->width('80%')->title($name);
            $dialog->slot(function (Content $content) {
                $code = "```php\n";
                $code .= file_get_contents((__FILE__));
                $code .= "\n```";
                $content->body(Markdown::make($code)->style("height:60vh;"));
            });
        });
    }


    public function form()
    {
        $content = new Content();
        $content->className('m-15');
        $form = new Form();
        $form->ref('demoForm');
        $form->item('input')->component(Input::make())->required()->inputWidth(10);
        $form->item('textarea')->component(Input::make()->textarea())->required();
        $form->item('password')->component(Input::make()->password())->required();
        $form->item('file')->component(Upload::make()->file()->multiple()->limit(3));
        $form->item('image')->component(Upload::make()->image()->multiple()->limit(3)->width(200)->height(100));
        $form->item('avatar')->component(Upload::make()->avatar());
        $form->item('IconChoose')->component(IconChoose::make())->required();
        $form->item('InputNumber')->component(InputNumber::make())->required('number');
        $form->item('Select')->component(Select::make()->options(function () {

            return collect(range(0, 50))->map(function () {
                return SelectOption::make(11233, '测试3')->avatar("https://gw.alipayobjects.com/zos/antfincdn/XAosXuNZyF/BiazfanxmamNRoxxVxka.png")->desc("测试2");
            })->all();
        }))->required();
        $form->item('Select-multiple')->component(Select::make()->multiple()->filterable()->options(function () {
            return collect(range(0, 50))->map(function () {
                return SelectOption::make(123123, '哈哈哈')->avatar("https://gw.alipayobjects.com/zos/antfincdn/XAosXuNZyF/BiazfanxmamNRoxxVxka.png")->desc("测试");
            })->all();
        }))->required('array');

        $form->item('Checkbox')->component(Checkbox::make(99999, 'hahah'))->defaultValue(0);


        $form->item('CheckboxGroup')->component(CheckboxGroup::make([10], [
            Checkbox::make(10, "测试1"),
            Checkbox::make(20, "测试2"),
        ]))->required("array");

        $form->item('RadioGroup')->component(RadioGroup::make(11, [
            Radio::make(10, "测试3"),
            Radio::make(11, "测试4"),
        ]))->required("number");

        $form->item('Switch')->component(CSwitch::make(true))->refData('demoForm', function () {
            return <<<JS
ref.formData.Switch2 = self.value
JS;
        })->help("我可以控制下面的Switch2哦");
        $form->item('Switch2')->component(CSwitch::make(true))->ref('Switch2');

        $form->item('Slider')->defaultValue([20, 30])->component(Slider::make()->showInput()->range(true)->max(40)->min(10)->showStops());
        $form->item('Slider-vertical')->defaultValue(20)->component(Slider::make()->max(40)->min(10)->vertical(true, "100px"));

        $form->item('TimePicker')->component(TimePicker::make()->pickerOptions([
            'start' => '00:00',
            'step' => '00:30',
            'end' => '24:00'
        ])->placeholder("TimePicker"));
        $form->item('TimePicker2')->component(TimePicker::make([])->pickerOptions([
            'start' => '00:00',
            'step' => '00:30',
            'end' => '24:00'
        ])->isRange()->rangeSeparator("至")->placeholder("TimePicker"));

        $form->item('DatePicker')->component(DatePicker::make())->ref('DatePicker')->componentRightComponent(function () {
            return (new Content())->row(function (Row $row) {
                $row->item(Text::make("选择类型："));
                $typeStr = "year/month/date/dates/week/datetime/datetimerange/daterange/monthrange";
                foreach (explode("/", $typeStr) as $type) {
                    $row->item(Button::make($type)->type("text")->refData('DatePicker', function () use ($type) {
                        return <<<JS
ref.attrs.type="$type";
JS;
                    }));
                }


            })->className("ml-10");
        });
        $form->item('DatePicker2')->component(DatePicker::make([])->type("daterange"));

        $form->item('DateTimePicker')->component(DateTimePicker::make())->ref('DateTimePicker')->componentRightComponent(function () {
            return (new Content())->row(function (Row $row) {
                $row->item(Text::make("选择类型："));
                $typeStr = "year/month/date/week/datetime/datetimerange/daterange";
                foreach (explode("/", $typeStr) as $type) {
                    $row->item(Button::make($type)->type("text")->refData('DateTimePicker', function () use ($type) {
                        return <<<JS
ref.attrs.type="$type";
JS;
                    }));
                }


            })->className("ml-10");
        });

        $form->item('Rate')->component(Rate::make(1));
        $form->item('ColorPicker')->component(ColorPicker::make("#ff6600"));
        $form->item('WangEditor')->component(WangEditor::make()->style('height:200px;')->className('flex-sub'));
        $form->top(function (Content $content) {
            $content->row($this->code())->className('mb-10');
        });
        $form->successRefData("demoForm", function () {
            return <<<JS
self.\$message.info("表单提交成功代码注入");
JS;

        });

        $form->actions(function (FormActions $formActions) {
            $formActions->hideCancelButton();

            $formActions->submitButton()->content("提交表单")->style("width:200px");

            $formActions->fixed();
            $formActions->getForm();
        });
        return $content->body($form);
    }

    public function layout()
    {
        $content = new Content();
        $content->className('m-15');
        $content->row($this->code());

        $content->row($this->br());

        // 单行单列
        $content->row($this->card('col-md-24', '#81C784'));

        // 一行多列
        $content->row(function (Row $row) {
            $row->gutter(15);
            $row->column(8, $this->card('col-md-8', '#7986CB'));
            $row->column(8, $this->card('col-md-8', '#7986CB'));
            $row->column(8, $this->card('col-md-8', '#7986CB'));
        });

        // 行里面有多个列,列里面再嵌套行
        $content->row(function (Row $row) {
            $row->gutter(15);
            $row->column(18, function (\HPlus\UI\Layout\Column $column) {
                // 一列多行
                $column->row($this->card(['col-md-24', 20], '#4DB6AC'));
                // 行里面再嵌套列
                $column->row(function (Row $row) {
                    $row->gutter(15);
                    $row->column(8, $this->card(['col-md-8', 30], '#80CBC4'));
                    $row->column(8, $this->card(['col-md-8', 30], '#4DB6AC'));
                    $row->column(8, function (\HPlus\UI\Layout\Column $column) {
                        $column->row(function (Row $row) {
                            $row->gutter(15);
                            $row->column(12, $this->card(['col-md-12', 30], '#26A69A'));
                            $row->column(12, $this->card(['col-md-12', 30], '#26A69A'));
                        });
                    });
                });
            });
            $row->column(6, $this->card(['col-md-6', 120], '#00897B'));
        });
        return $content;
    }

    protected function p($text, $height = 80)
    {
        return "<p style='height:{$height}px;color:#fff'><span>$text</span></p>";
    }

    protected function card($text, $color = '#fff')
    {
        $text = $this->p(...(is_string($text) ? [$text] : $text));

        $html = <<<EOF
<div style="background:$color;padding:10px 22px 16px;box-shadow:0 1px 3px 1px rgba(34, 25, 25, 0.1);margin-bottom:15px;border-radius: 5px;">
$text
</div>
EOF;
        return Html::make()->html($html);
    }

    public function grid()
    {
        $page = request('page');
        $pre = 10;
        $grid = new Grid();
        if ($grid->isGetData()) {
            $start = ($page - 1) * $pre;
            $data = file_get_contents('http://web.peakchao.top:250/music/getMusicBanner');
            $data = json_decode($data, true);
            $lsat_page = (int)10;
            $grid->customData($data['result'], $page, $pre, $lsat_page, 100);
        }
        $grid->dataUrl('/index/grid');
        $grid->autoHeight();
        $grid->column('name')->width(180);
        $grid->column('img1', 'Image')->defaultValue('https://wx.qlogo.cn/mmopen/vi_32/ajNVdqHZLLBpqXMk6kUC4PeB5VrIVtHyUqrcPg65sjKdPxlkBINiaQ1NG6nZC9iaWOh9qdO6VaApJzgWA1wu5h8Q/132')->component(Avatar::make())->width(80);
        $grid->column('singer')->width(80);

        $grid->batchActions(function (Grid\BatchActions $actions) {
            $actions->hideDeleteAction();
        });
        $grid->ref("top250");
        $grid->toolbars(function (Grid\Toolbars $toolbars) {
            $toolbars->createButton()->disabled();
            $js = <<<JS
self.attrs.type='success'
self.\$message.success("获取成功，请在浏览器调试器查看打印数据")
console.log(ref)
JS;
            $toolbars->addLeft(Button::make("动态获取已选择的项目")->refData("top250", $js));
            $js = <<<JS
ref.\$refs.top250.clearSelection();
JS;

            $toolbars->addLeft(Button::make("调用表格事件，清除全选")->refData("top250", $js)->className('ml-10'));

            $js = <<<JS
ref.\$bus.emit("tableReload");
JS;

            $toolbars->addLeft(Button::make("手动发送emit")->refData("top250", $js)->className('ml-10'));

            $toolbars->addLeft(Button::make("表格交互")->ref('gButton')->className('ml-10')->dialog(function (Dialog $dialog) {
                $dialog->width('40%');
                $dialog->ref("gDialog")->showClose(false);
                $dialog->slot(function (Content $content) {
                    $this->dialogGrid($content);
                });
                $dialog->title("表格交互");
            }));
            $js = <<<JS
let table = ref.\$refs.top250
table.stripe=false;
table['rowClassName'] = ({row, rowIndex})=>{
        if (rowIndex === 1) {
          return 'warning-row';
        } else if (rowIndex === 3) {
          return 'success-row';
        }
        return '';
}
JS;
            $toolbars->addLeft(Button::make("设置表格row-class-name")->refData("top250", $js)->className('ml-10'));
        });

        $grid->top(function (Content $content) {
            $content->row($this->code())->className('mb-10');
        });

        $grid->selection();
        $grid->actions(function (Grid\Actions $actions) {
            $actions->hideEditAction();
            $actions->hideDeleteAction();
            $title = $actions->getRow()['name'] ?? '';
            $actions->add(Grid\Actions\ActionButton::make("操作：$title"));
        });

        return $grid;
    }


    /**
     */
    public function apiDialogGrid()
    {
        $content = new Content();
        return  $this->dialogGrid($content)->jsonSerialize();
    }

    protected function dialogGrid(Content $content)
    {
        $page = request('page');
        $pre = 10;
        $grid = new Grid();
        $grid->dataUrl('/index/apiDialogGrid');
        if ($grid->isGetData()) {
            $data = file_get_contents('http://web.peakchao.top:250/music/getMusicBanner');
            $data = json_decode($data, true);
            $lsat_page = (int)10;
            $grid->customData($data['result'], $page, $pre, $lsat_page, 100);
        }
        $grid->column('name')->width(180);
        $grid->column('img1', 'Image')->defaultValue('https://wx.qlogo.cn/mmopen/vi_32/ajNVdqHZLLBpqXMk6kUC4PeB5VrIVtHyUqrcPg65sjKdPxlkBINiaQ1NG6nZC9iaWOh9qdO6VaApJzgWA1wu5h8Q/132')->component(Avatar::make())->width(80);
        $grid->column('singer')->width(80);
        $grid->hideActions()->selection();
        $grid->toolbars(function (Grid\Toolbars $toolbars) {
            $toolbars->hide();
        });
        $grid->batchActions(function (Grid\BatchActions $actions) {
            $actions->hideDeleteAction();
        });
        if ($grid->isGetData()) {
            return $grid;
        }
        $content->row($grid);
        $grid->ref("dialogGrid");

        $grid->bottom(function (Content $content) {
            $js = <<<JS

ref.\$bus.emit("gButton",{data:"ref.attrs.content = '一共选择了：'+self.selectionRows.length;ref.dialogTableVisible=false;ref.attrs.type='success';",self:ref})

JS;
            $content->row(Button::make("将选中的匹配到页面")->refData("dialogGrid", $js))->className('p-10');
        });
        return $content;
    }
}
