<?php
declare(strict_types=1);
namespace Mzh\UI;


use \Hyperf\Database\Model\Builder;
use \Hyperf\Database\Model\Model as Eloquent;
use \Hyperf\Database\Model\Relations;
use Hyperf\Utils\Str;
use Mzh\UI\Components\Component;
use Mzh\UI\Grid\Actions;
use Mzh\UI\Grid\BatchActions;
use Mzh\UI\Grid\Column;
use Mzh\UI\Grid\Concerns\HasDefaultSort;
use Mzh\UI\Grid\Concerns\HasFilter;
use Mzh\UI\Grid\Concerns\HasGridAttributes;
use Mzh\UI\Grid\Concerns\HasPageAttributes;
use Mzh\UI\Grid\Concerns\HasQuickSearch;
use Mzh\UI\Grid\Filter;
use Mzh\UI\Grid\Model;
use Mzh\UI\Grid\Table\Attributes;
use Mzh\UI\Grid\Toolbars;
use Mzh\UI\Layout\Content;


class Grid extends Component
{
    use HasGridAttributes, HasPageAttributes, HasDefaultSort, HasQuickSearch, HasFilter;

    /**
     * 组件名称
     * @var string
     */
    protected $componentName = 'Grid';

    /**
     * @var Model
     */
    protected $model;
    /**
     * 组件字段
     * @var Column[]
     */
    protected $columns = [];
    protected $rows;
    /**
     * 组件字段属性
     * @var array
     */
    protected $columnAttributes = [];
    /**
     * @var string
     */
    protected $keyName = 'id';
    /**
     * @var bool
     */
    protected $tree = false;
    /**
     * 表格数据来源
     * @var string
     */
    protected $dataUrl;

    protected $customData;

    protected $isGetData = false;
    private $actions;
    private $batchActions;
    private $toolbars;
    private $top;
    private $bottom;

    /**
     * 请求方式
     * @var string
     */
    private $method = "get";

    /**
     * 附加字段
     * @var array
     */
    private $appendFields = [];


    /**
     * @var Form
     */
    protected $dialogForm;
    /**
     * @var string
     */
    protected $dialogFormWidth;
    protected $dialogTitle = ['添加', '修改'];


    public function __construct(Eloquent $model = null)
    {
        $this->attributes = new Attributes();
        $this->dataUrl = admin_api_url(request()->path()).'/list';
        $this->model = new Model($model, $this);
        if ($model) {
            $this->keyName = $model->getKeyName();
            $this->defaultSort($model->getKeyName(), "asc");
        }
        $this->isGetData = request('get_data') == "true";
        $this->toolbars = new Toolbars($this);
        $this->batchActions = new BatchActions();
        $this->filter = new Filter($this->model);
    }

    /**
     * 获取自定义数据模型
     * @return Model|Builder
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getKeyName(): string
    {
        return $this->keyName;
    }

    /**
     * 自定义数据源路径
     * @param string $dataUrl
     * @return $this
     */
    public function dataUrl(string $dataUrl)
    {
        $this->dataUrl = $dataUrl;
        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function method(string $method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return array
     */
    public function getAppendFields(): array
    {
        return $this->appendFields;
    }

    /**
     * 数据返回附加字段
     * @param array $appendFields
     * @return $this
     */
    public function appendFields(array $appendFields)
    {
        $this->appendFields = $appendFields;
        return $this;
    }


    /**
     * @return bool
     */
    public function isGetData(): bool
    {
        return $this->isGetData;
    }


    /**
     * 设置树形表格
     * @param bool $tree
     * @return $this
     */
    public function tree($tree = true)
    {
        $this->tree = $tree;
        return $this;
    }


    /**
     * Grid添加字段
     * @param string $name 对应列内容的字段名
     * @param string $label 显示的标题
     * @param string $columnKey 排序查询等数据操作字段名称
     * @return Column
     */
    public function column($name, $label = '', $columnKey = null)
    {
        if (Str::contains($name, '.')) {
            $this->addRelationColumn($name, $label);
        }

        return $this->addColumn($name, $label, $columnKey);
    }

    /**
     * @param string $name
     * @param string $label
     * @param $columnKey
     * @return Column
     */
    protected function addColumn($name = '', $label = '', $columnKey = null)
    {
        $column = new Column($name, $label, $columnKey);
        $column->setGrid($this);
        $this->columns[] = $column;
        return $column;
    }

    /**
     * Add a relation column to grid.
     *
     * @param string $name
     * @param string $label
     *
     * @return $this|bool|Column
     */
    protected function addRelationColumn($name, $label = '')
    {
        if ($this->model) {
            list($relation, $column) = explode('.', $name);
            $model = $this->model()->eloquent();
            if (!method_exists($model, $relation) || !$model->{$relation}() instanceof Relations\Relation) {
            } else {
                $this->model()->with($relation);
            }

        }

    }

    /**
     * @param Column[] $columns
     */
    protected function columns($columns)
    {
        $this->columnAttributes = collect($columns)->map(function (Column $column) {
            return $column->getAttributes();
        })->toArray();
    }

    public function getColumns()
    {
        return $this->columns;
    }

    protected function applyQuery()
    {
        //快捷搜索
        $this->applyQuickSearch();

        $this->applyFilter(false);

    }

    /**
     * 自定义toolbars
     * @param $closure
     * @return $this
     */
    public function toolbars($closure)
    {
        call_user_func($closure, $this->toolbars);
        return $this;
    }

    /**
     * 自定义行操作
     * @param $closure
     * @return $this
     */
    public function actions($closure)
    {
        $this->actions = $closure;
        return $this;
    }

    /**
     * 自定义批量操作
     * @param \Closure $closure
     * @return $this
     */
    public function batchActions(\Closure $closure)
    {
        call_user_func($closure, $this->batchActions);
        return $this;
    }

    /**
     * 获取行操作
     * @param $row
     * @param $key
     * @return mixed
     */
    public function getActions($row, $key)
    {
        $actions = new Actions($this);
        $actions->row($row)->key($key);
        if ($this->actions) call_user_func($this->actions, $actions);
        return $actions->builderActions();
    }

    /**
     * @param Form $dialogForm
     * @param  $width
     * @param  $title
     * @return Grid
     */
    public function dialogForm(Form $dialogForm, $width = '750px', $title = ['添加', '修改'])
    {
        $this->dialogForm = $dialogForm;
       // $this->dialogForm->labelPosition('right')->labelWidth('90px');
        $this->dialogFormWidth = $width;
        $this->dialogTitle = $title;
        return $this;
    }

    /**
     * @return Form
     */
    public function getDialogForm()
    {
        return $this->dialogForm;
    }


    /**
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
     * 自定义数据
     * @param $data
     * @param $current_page
     * @param $per_page
     * @param $last_page
     * @param $total
     * @return $this
     */
    public function customData($data, $current_page = 0, $per_page = 0, $last_page = 0, $total = 0)
    {
        $this->customData = [
            'current_page' => (int)$current_page,
            'per_page' => (int)$per_page,
            'last_page' => (int)$last_page,
            'total' => (int)$total,
            'data' => $data,
        ];
        return $this;
    }


    /**
     * data
     * @return array
     */
    protected function data()
    {
        if ($this->customData) {
            $this->customData['data'] = $this->model()->displayData($this->customData['data']);
            return [
                'code' => 200,
                'data' => $this->customData
            ];
        }

        $this->applyQuery();
        $data = $this->model->buildData();

        return [
            'code' => 200,
            'data' => $data
        ];
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        if (count($this->columnAttributes) <= 0) {
            $this->columns($this->columns);
        }
        if ($this->isGetData) {
            return $this->data();
        } else {
            $viewData['componentName'] = $this->componentName;
            $viewData['routers'] = [
                'resource' => admin_api_url(request()->path()),
            ];
            $viewData['keyName'] = $this->keyName;
            $viewData['selection'] = $this->attributes->selection;
            $viewData['tree'] = $this->tree;
            $viewData['defaultSort'] = $this->defaultSort;
            $viewData['columnAttributes'] = $this->columnAttributes;
            $viewData['attributes'] = (array)$this->attributes;
            $viewData['dataUrl'] = $this->dataUrl;
            $viewData['method'] = $this->method;
            $viewData['hidePage'] = $this->isHidePage();
            $viewData['pageSizes'] = $this->pageSizes;
            $viewData['perPage'] = $this->perPage;
            $viewData['pageLayout'] = $this->pageLayout;
            $viewData['pageBackground'] = $this->pageBackground;
            $viewData['toolbars'] = $this->toolbars->builderData();
            $viewData['batchActions'] = $this->batchActions->builderActions();
            $viewData['quickSearch'] = $this->quickSearch;
            $viewData['filter'] = $this->filter->buildFilter();
            $viewData['top'] = $this->top;
            $viewData['bottom'] = $this->bottom;
            $viewData['dialogForm'] = $this->dialogForm;
            $viewData['dialogFormWidth'] = $this->dialogFormWidth;
            $viewData['dialogTitle'] = $this->dialogTitle;
            $viewData['ref'] = $this->getRef();
            return $viewData;
        }
    }

    /**
     * @return string
     */
    public function getComponentName(): string
    {
        return $this->componentName;
    }

    /**
     * @param string $componentName
     */
    public function setComponentName(string $componentName)
    {
        $this->componentName = $componentName;
        return $this;
    }

    /**
     * @param bool $isGetData
     */
    public function setGetData(bool $isGetData): void
    {
        $this->isGetData = $isGetData;
    }
}
