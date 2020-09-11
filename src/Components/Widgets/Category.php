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

use Hyperf\Database\Model\Model as Eloquent;
use HPlus\UI\Components\Component;
use HPlus\UI\Grid\BatchActions;
use HPlus\UI\Grid\Column;
use HPlus\UI\Grid\Concerns\HasDefaultSort;
use HPlus\UI\Grid\Concerns\HasFilter;
use HPlus\UI\Grid\Concerns\HasGridAttributes;
use HPlus\UI\Grid\Concerns\HasPageAttributes;
use HPlus\UI\Grid\Concerns\HasQuickSearch;
use HPlus\UI\Grid\Filter;
use HPlus\UI\Grid\Model;
use HPlus\UI\Grid\Table\Attributes;
use HPlus\UI\Grid\Toolbars;
use HPlus\UI\Layout\Content;

class Category extends Component
{
    protected $componentName = "Tree";
    protected $header;
    protected $bodyStyle;

    protected $content;
    use HasGridAttributes, HasPageAttributes, HasDefaultSort, HasQuickSearch, HasFilter;

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

    public static function make()
    {
        return new Category();
    }
}
