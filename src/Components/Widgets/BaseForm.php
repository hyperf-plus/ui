<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Widgets;

use Hyperf\Utils\Arr;
use HPlus\UI\Components\Component;
use HPlus\UI\Form\FormAttrs;
use HPlus\UI\Form\FormItem;
use HPlus\UI\Form\TraitFormAttrs;

/**
 * 基础表单，已废弃，直接使用Form组件即可
 * @deprecated
 * Class BaseForm
 * @package HPlus\UI\Components\Widgets
 */
class BaseForm extends Component
{

    use TraitFormAttrs;

    protected $componentName = "BaseForm";

    protected $formItems = [];
    protected $formItemsValue = [];

    protected $tabs = [];

    protected $action;



    protected $emits = [];


    public function __construct()
    {
        $this->attrs = new FormAttrs();
        $this->attrs->labelWidth = "100px";
    }


    /**
     * 生成字段
     * @param $prop
     * @param string $label
     * @param string $field
     * @return FormItem
     */
    public function item($prop, $label = '', $field = '')
    {
        return $this->addItem($prop, $label, $field);
    }

    /**
     * @param $prop
     * @param $label
     * @param $field
     * @return FormItem
     */
    protected function addItem($prop, $label, $field)
    {
        $item = new FormItem($prop, $label, $field);
        $item->setForm($this);
        $this->formItems[] = $item;
        return $item;
    }

    /**
     * 设置表单action路径
     * @param mixed $action
     * @return $this
     */
    public function action($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * 添加表单值
     * @param $key
     * @param $value
     */
    public function addValue($key, $value)
    {
        Arr::set($this->formItemsValue, $key, $value);
    }

    /**
     * 添加表单提交成功发送事件
     * @param string $name 事件名称
     * @param mixed $data 事件参数
     */
    public function emit($name, $data = null)
    {
        $this->emits = collect($this->emits)->push([
            'name' => $name,
            'data' => $data
        ]);
    }

    public function jsonSerialize()
    {
        $items = $this->formItems;

        $this->tabs = collect($items)->map(function (FormItem $item){
            return $item->getTab();
        })->unique()->all();


        /**@var FormItem $item */
        foreach ($items as $item) {
            Arr::set($this->formItemsValue, $item->getProp(), $item->getDefaultValue());
        }

        $this->formItems = collect($this->formItems)->map(function (FormItem $item) {
            return $item->getAttrs();
        })->all();


        $data = null;
        $hide = collect($this->hideAttrs)->push("hideAttrs")->toArray();
        foreach ($this as $key => $val) {
            if (!in_array($key, $hide)) {
                $data[$key] = $val;
            }
        }
        return $data;
    }

}
