<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */

namespace HPlus\UI;

use HPlus\UI\Layout\Row;
use HPlus\Validate\Validate;
use Hyperf\Database\Schema\Schema;
use Hyperf\DbConnection\Db;
use \Hyperf\Database\Model\Builder;
use \Hyperf\Database\Model\Model;
use \Hyperf\Database\Model\Relations;
use \Hyperf\Database\Model\Relations\Relation;
use Hyperf\HttpMessage\Server\Response;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Str;
use HPlus\UI\Components\Component;
use HPlus\UI\Components\Form\Upload;
use HPlus\UI\Exception\ValidateException;
use HPlus\UI\Form\FormActions;
use HPlus\UI\Form\FormAttrs;
use HPlus\UI\Form\FormItem;
use HPlus\UI\Form\HasHooks;
use HPlus\UI\Form\HasRef;
use HPlus\UI\Form\TraitFormAttrs;
use HPlus\UI\Layout\Content;

class Form extends Component
{
    use TraitFormAttrs, HasHooks, HasRef;
    protected $componentName = "Form";

    const REMOVE_FLAG_NAME = '_remove_';
    /**
     * @var Model|Builder
     */
    protected $model;

    protected $id = 0;

    protected $formItemsAttr = [];
    protected $formItemsValue = [];
    protected $formRules = [];
    protected $formItemRows = [];
    protected $formItems = [];
    protected $formItemLayout = [];
    protected $ignoreEmptyProps = [];
    protected $tabPosition = "top";


    const MODE_EDIT = 'edit';
    const MODE_CREATE = 'create';
    protected $mode = 'create';
    protected $action;

    protected $dataUrl;

    protected $ignored = [];

    protected $updates = [];

    protected $isEdit = false;

    /**
     * Data for save to model's relations from input.
     *
     * @var array
     */
    protected $relations = [];

    /**
     * Input data.
     *
     * @var array
     */
    protected $inputs = [];

    protected $isGetData = false;

    /**
     * 编辑数据
     * @var array
     */
    public $editData = [];

    protected $addRule = [];
    protected $addRuleMessage = [];

    /**
     * @var \Validator
     */
    protected $validator;


    private $top;
    private $bottom;

    protected $actions;


    public function __construct($model = null)
    {
        $this->attrs = new FormAttrs();
        $this->model = $model;
        $this->dataUrl = admin_api_url(request()->path());
        $this->isGetData = request('get_data') == "true";
        $this->actions = new FormActions($this);
    }

    /**
     * 快捷生成字段
     * @param $prop
     * @param string $label
     * @param string $field
     * @return FormItem
     */
    public function item($prop, $label = '', $field = '')
    {
        $item = $this->addItem($prop, $label, $field);
        $this->row(function (Row $row) use ($item) {
            $row->item($item);
        });
        return $item;
    }

    /**
     * 多列布局字段
     * @param $prop
     * @param string $label
     * @param string $field
     * @return FormItem
     */
    public function rowItem($prop, $label = '', $field = '')
    {
        return $this->addItem($prop, $label, $field);
    }


    /**
     * 表单自定义布局
     * @param \Closure $closure
     * @return $this
     */
    public function row(\Closure $closure)
    {

        $row = new Row();
        call_user_func($closure, $row, $this);

        $this->tab("default", function (FormTab $formTab) use ($row) {
            $formTab->row($row);
        });

        return $this;
    }

    /**
     * 自定义tab布局
     * @param $tabName
     * @param \Closure $closure
     * @return $this
     */
    public function tab($tabName, \Closure $closure)
    {

        $tab = collect($this->formItemLayout)->filter(function (FormTab $formTab) use ($tabName) {
            return $formTab->getName() == $tabName;
        })->first();
        if (empty($tab)) {
            $tab = new FormTab($tabName, $this);
            call_user_func($closure, $tab, $this);
            $this->formItemLayout[] = $tab;
        } else {
            call_user_func($closure, $tab, $this);
        }
        return $this;
    }

    /**
     * tab位置
     * @param $tabPosition
     * @return $this
     */
    public function tabPosition($tabPosition)
    {
        $this->tabPosition = $tabPosition;
        return $this;
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
     * @param array $items
     */
    protected function items($items = [])
    {

        $this->ignoreEmptyProps = collect($items)->filter(function (FormItem $item) {
            return $item->isIgnoreEmpty();
        })->map(function (FormItem $item) {
            return $item->getProp();
        })->flatten()->all();

        // 根据所处模式抛弃组件
        $this->formItemsAttr = collect($items)->filter(function (FormItem $item) {
            return !$this->isMode($item->gethiddenMode());
        })->map(function (FormItem $item) {
            return $item->getAttrs();
        });
        /**@var FormItem $item */
        foreach ($items as $item) {
            Arr::set($this->formItemsValue, $item->getProp(), $item->getDefaultValue());
            Arr::set($this->formRules, $item->getProp(), $item->getRules());
        }

    }

    /**
     * 自定义表单动作
     * @param $closure
     * @return $this
     */
    public function actions(\Closure $closure)
    {
        call_user_func($closure, $this->actions);
        return $this;
    }

    /**
     * 表单头部组件
     * @param $closure
     * @return $this
     */
    public function top($closure)
    {
        $this->top = new Content();
        call_user_func($closure, $this->top);
        return $this;
    }

    /**
     * 表单底部组件
     * @param $closure
     * @return $this
     */
    public function bottom($closure)
    {
        $this->bottom = new Content();
        call_user_func($closure, $this->bottom);
        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        if ($this->action) {
            return $this->action;
        }
        if ($this->isMode(static::MODE_EDIT)) {
            return $this->resource() . '/' . $this->id;
        }

        if ($this->isMode(static::MODE_CREATE)) {
            return $this->resource(-1);
        }

        return '';
    }

    /**
     * 设置表单编辑模式获取编辑数据地址
     * @param string $dataUrl
     * @return $this
     */
    public function dataUrl(string $dataUrl)
    {
        $this->dataUrl = $dataUrl;
        return $this;
    }


    /**
     * 设置表单提交地址
     * @param string $action
     * @return $this
     */
    public function action($action)
    {
        $this->action = $action;
        return $this;
    }

    protected function setMode($mode = 'create')
    {
        $this->mode = $mode;
    }

    public function isMode($mode): bool
    {
        return $this->mode === $mode;
    }

    public function setResourceId($id)
    {
        $this->id = $id;
    }

    public function getResourceId()
    {
        return $this->id;
    }

    public function resource($slice = -2): string
    {

        $segments = explode('/', trim(admin_api_url(request()->path()), '/'));

        if ($slice !== 0) {
            $segments = array_slice($segments, 0, $slice);
        }

        return implode('/', $segments);
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * 获取模型
     * @return Model
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * 获取表单是否是编辑模式
     * @return bool
     */
    public function isEdit()
    {
        return $this->isEdit;
    }


    /**
     * 添加表单验证规则
     * @param $rules
     * @param $message
     * @return $this
     */
    public function addValidatorRule($rules, $message = [])
    {
        $this->addRule = $rules;
        $this->addRuleMessage = $message;

        return $this;
    }

    /**
     * @param $data
     * @return string
     */
    protected function validatorData($data)
    {
        try {
            $rules = [];
            $ruleMessages = [];
            /* @var FormItem $formItem */
            foreach ($this->formItems as $formItem) {
                if (empty($formItem->getServeRole())) {
                    continue;
                }

                $rules[$formItem->getField()] = $formItem->getServeRole();
                $messages = $formItem->getServeRulesMessage();
                if (is_array($messages)) {
                    foreach ($messages as $key => $message) {
                        $ruleMessages[$formItem->getField() . '.' . $key] = $message;
                    }
                }
            }

            $rules = array_merge($rules, $this->addRule);
            $ruleMessages = array_merge($ruleMessages, $this->addRuleMessage);

            $this->validator = \Validator::make($data, $rules, $ruleMessages);

            $this->callValidating($this->validator);

            if ($this->validator->fails()) {
                abort(400, $this->validator->errors()->first());
            }
            return false;
        } catch (\Exception $exception) {
            return $exception->getMessage(); //\Admin::responseError();
        }
    }

    public function input($key, $value = null)
    {
        if (is_null($value)) {
            return Arr::get($this->inputs, $key);
        }
        return Arr::set($this->inputs, $key, $value);
    }

    protected function prepare($data = [])
    {


        //处理要过滤的字段
        $this->inputs = array_merge($this->removeIgnoredFields($data), $this->inputs);
        //处理表单提交时事件
        if (($response = $this->callSaving()) instanceof Response) {
            return $response;
        }

        //处理关联字段
        $this->relations = $this->getRelationInputs($this->inputs);

        $this->updates = Arr::except($this->inputs, array_keys($this->relations));
    }

    protected function removeIgnoredFields($input): array
    {
        Arr::forget($input, $this->ignored);

        return $input;
    }

    protected function getRelationInputs($inputs = []): array
    {
        $relations = [];

        foreach ($inputs as $column => $value) {
            $column = \Illuminate\Support\Str::camel($column);
            if (!method_exists($this->model, $column)) {
                continue;
            }
            $relation = call_user_func([$this->model, $column]);
            if ($relation instanceof Relation) {
                $relations[$column] = $value;
            }
        }
        return $relations;
    }

    protected function prepareInsert($inserts)
    {
        $prepared = [];

        $columns = \Schema::getColumnListing($this->model()->getTable());
        foreach ($inserts as $key => $value) {
            if (in_array($key, $columns)) {
                Arr::set($prepared, $key, $value);
            }
        }
        return $prepared;
    }

    public function getRelations(): array
    {
        $relations = [];
        $columns = collect($this->formItems)->map(function (FormItem $item) {
            return $item->getProp();
        })->toArray();

        foreach (Arr::flatten($columns) as $column) {

            if (Str::contains($column, '.')) {
                list($relation) = explode('.', $column);

                if (method_exists($this->model, $relation) &&
                    $this->model->$relation() instanceof Relation
                ) {

                    $relations[] = $relation;
                }
            } elseif (method_exists($this->model, $column)) {
                $relations[] = $column;
            }
        }
        return array_unique($relations);
    }

    public function store()
    {

        if (($result = $this->callSubmitted()) instanceof Response) {
            return $result;
        }

        $data = request()->all();

        if ($validationMessages = $this->validatorData($data)) {
            return Admin::responseError($validationMessages);
        }

        if (($response = $this->prepare($data)) instanceof Response) {
            return $response;
        }

        DB::transaction(function () use ($data) {
            $inserts = $this->prepareInsert($this->updates);

            foreach ($inserts as $key => $value) {
                $this->model->setAttribute($key, $value);
            }
            $this->model->save();
            $this->updateRelation($this->relations);
            if (($result = $this->callDbTransaction()) instanceof Response) {
                abort(400, $result);
            }
        });
        if (($result = $this->callSaved()) instanceof Response) {
            return $result;
        }
        return Admin::responseMessage(trans('admin::admin.save_succeeded'));
    }

    /**
     * 编辑
     * @param $id
     * @return array|string
     */
    public function edit($id = 0)
    {
        $this->isEdit = true;

        $this->setMode(self::MODE_EDIT);

        $this->setResourceId($id);

        return $this;
    }

    protected function deleteFiles(Model $model, $forceDelete = false)
    {
        $data = $model->toArray();
        collect($this->formItems)->filter(function (FormItem $formItem) {
            return $formItem->getComponent() instanceof Upload;
        })->each(function (FormItem $formItem) use ($data) {
            $formItem->setOriginal($data);
            /**@var Upload $component */
            $component = $formItem->getComponent();
            $component->destroy($formItem);
        });
    }

    /**
     * 模型删除
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            if (($ret = $this->callDeleting($id)) instanceof Response) {
                return $ret;
            }
            collect(explode(',', $id))->each(function ($id) {
                $builder = $this->model()->newQuery();
                $relations = $this->getRelations();
                $this->model = $model = $builder->with($relations)->findOrFail($id);
                //删除文件
                $this->deleteFiles($model);
                //删除关联模型数据
                $this->deleteRelation($relations);
                $model->delete();
            });
            if (($ret = $this->callDeleted()) instanceof Response) {
                return $ret;
            }
            return \Admin::responseMessage(trans('admin::admin.delete_succeeded'));
        } catch (\Exception $exception) {
            return \Admin::responseError($exception->getMessage() ?: trans('admin::admin.delete_failed'));
        }
    }

    /**
     * @param $id
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update($id, $data = null)
    {
        $this->isEdit = true;

        if (($result = $this->callSubmitted()) instanceof Response) {
            return $result;
        }
        $data = ($data) ?: request()->all();

        $this->setResourceId($id);

        $builder = $this->model();
        $this->model = $builder->findOrFail($id);

        if ($validationMessages = $this->validatorData($data)) {
            return Admin::responseError($validationMessages);
        }

        if (($response = $this->prepare($data)) instanceof Response) {
            return $response;
        }
        DB::transaction(function () use ($data) {
            $updates = $this->prepareUpdate($this->updates);
            foreach ($updates as $key => $value) {
                $this->model->setAttribute($key, $value);
            }
            $this->model->save();
            $this->updateRelation($this->relations);
            if (($result = $this->callDbTransaction()) instanceof Response) {
                abort(400, $result);
            }
        });

        if (($result = $this->callSaved()) instanceof Response) {
            return $result;
        }

        return Admin::responseMessage(trans('admin::admin.update_succeeded'));
    }

    protected function prepareUpdate(array $updates, $oneToOneRelation = false)
    {
        $prepared = [];
        $columns = \Schema::getColumnListing($this->model()->getTable());
        foreach ($updates as $key => $value) {
            if (in_array($key, $columns)) {
                Arr::set($prepared, $key, $value);
            }
        }
        return $prepared;
    }

    private function deleteRelation($relations)
    {

        foreach ($relations as $name) {
            if (!method_exists($this->model, $name)) {
                continue;
            }
            $relation = $this->model->$name();
            switch (true) {
                case $relation instanceof Relations\HasOne:
                    $relation->delete();
                    break;
            }

        }
    }

    private function updateRelation($relationsData)
    {

        foreach ($relationsData as $name => $values) {
            if (!method_exists($this->model, $name)) {
                continue;
            }
            $relation = $this->model->$name();

            $oneToOneRelation = $relation instanceof Relations\HasOne
                || $relation instanceof Relations\MorphOne
                || $relation instanceof Relations\BelongsTo;

            //$prepared = $this->prepareUpdate([$name => $values], $oneToOneRelation);

            $prepared = [$name => $values];

            if (empty($prepared)) {
                continue;
            }
            switch (true) {
                case $relation instanceof Relations\BelongsToMany:
                case $relation instanceof Relations\MorphToMany:
                    if (isset($prepared[$name])) {
                        $relation->sync($prepared[$name]);
                    }
                    break;
                case $relation instanceof Relations\HasOne:

                    $related = $this->model->$name;

                    // if related is empty
                    if (is_null($related)) {
                        $related = $relation->getRelated();
                        $qualifiedParentKeyName = $relation->getQualifiedParentKeyName();
                        $localKey = Arr::last(explode('.', $qualifiedParentKeyName));
                        $related->{$relation->getForeignKeyName()} = $this->model->{$localKey};
                    }

                    foreach ($prepared[$name] as $column => $value) {
                        $related->setAttribute($column, $value);
                    }

                    $related->save();
                    break;
                case $relation instanceof Relations\BelongsTo:
                case $relation instanceof Relations\MorphTo:

                    $parent = $this->model->$name;

                    // if related is empty
                    if (is_null($parent)) {
                        $parent = $relation->getRelated();
                    }

                    foreach ($prepared[$name] as $column => $value) {
                        $parent->setAttribute($column, $value);
                    }

                    $parent->save();

                    // When in creating, associate two models
                    $foreignKeyMethod = version_compare(app()->version(), '5.8.0', '<') ? 'getForeignKey' : 'getForeignKeyName';
                    if (!$this->model->{$relation->{$foreignKeyMethod}()}) {
                        $this->model->{$relation->{$foreignKeyMethod}()} = $parent->getKey();

                        $this->model->save();
                    }

                    break;
                case $relation instanceof Relations\MorphOne:
                    $related = $this->model->$name;
                    if ($related === null) {
                        $related = $relation->make();
                    }
                    foreach ($prepared[$name] as $column => $value) {
                        $related->setAttribute($column, $value);
                    }
                    $related->save();
                    break;
                case $relation instanceof Relations\HasMany:
                case $relation instanceof Relations\MorphMany:

                    foreach ($prepared[$name] as $related) {
                        /** @var Relations\Relation $relation */
                        $relation = $this->model()->$name();

                        $keyName = $relation->getRelated()->getKeyName();

                        $instance = $relation->findOrNew(Arr::get($related, $keyName));

                        //处理已删除的关联
                        try {
                            if ($related[static::REMOVE_FLAG_NAME] == 1) {
                                $instance->delete();
                                continue;
                            }
                            Arr::forget($related, static::REMOVE_FLAG_NAME);
                        } catch (\Exception $exception) {

                        }
                        //过滤不存在的字段
                        foreach ($related as $key => $value) {
                            if (\Schema::hasColumn($instance->getTable(), $key)) {
                                $instance->setAttribute($key, $value);
                            }

                        }
                        $instance->save();
                    }

                    break;
            }
        }
    }

    /**
     * 获取编辑数据
     * @param $id
     * @return array
     */
    public function editData($id)
    {

        $this->isEdit = true;

        if (($result = $this->callEditing($id)) instanceof Response) {
            return $result;
        }

        $this->setMode(self::MODE_EDIT);
        $this->setResourceId($id);
        $this->editData = $this->model = $this->model->with($this->getRelations())->findOrFail($this->getResourceId());
        $data = [];
        /**@var FormItem $formItem */
        foreach ($this->formItems as $formItem) {
            $field = $formItem->getField();
            $prop = $formItem->getProp();
            $component = $formItem->getComponent();
            // 利用model的hidden属性
            if (in_array($prop, $this->model->getHidden())) {
                Arr::set($data, $prop, $formItem->getData(null, $this->model, $component));
            } else {
                Arr::set($data, $prop, $formItem->getData(Arr::get($this->editData, $prop), $this->model, $component));
            }
        }
        foreach ($this->formItems as $formItem) {
            $prop = $formItem->getProp();
            if ($formItem->getCopyProp()) {
                Arr::set($data, $prop, Arr::get($data, $formItem->getCopyProp()));
            }
        }
        $this->editData = $data;

        if (($result = $this->callEdiQuery($data)) instanceof Response) {
            return $result;
        }

        return [
            'code' => 200,
            'data' => $this->editData,
        ];

    }

    /**
     * 设置是否加载数据
     * @param bool $isGetData
     * @return $this
     */
    public function isGetData(bool $isGetData)
    {
        $this->isGetData = $isGetData;
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        if (count($this->formItemsAttr) <= 0) {
            $this->items($this->formItems);
        }
        if ($this->isGetData) {
            return $this->editData($this->getResourceId());
        }
        return array_filter([
            'componentName' => $this->componentName,
            'action' => $this->getAction(),
            'dataUrl' => $this->dataUrl,
            'mode' => $this->getMode(),
            'attrs' => $this->attrs,
            'ignoreEmptyProps' => $this->ignoreEmptyProps,
            'formItemLayout' => $this->formItemLayout,
            'tabPosition' => $this->tabPosition,
            'defaultValues' => (object)$this->formItemsValue,
            'formRules' => (object)$this->formRules,
            'ref' => $this->ref,
            'refData' => $this->refData,
            'formRefData' => $this->FormRefDataBuild(),
            'top' => $this->top,
            'bottom' => $this->bottom,
            'actions' => $this->actions->builderActions()
        ]);
    }

    public function __get($name)
    {
        return $this->input($name);
    }

    public function __set($name, $value)
    {
        return Arr::set($this->inputs, $name, $value);
    }
}