<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Form;


use \Hyperf\Database\Model\Builder;
use \Hyperf\Database\Model\Model as EloquentModel;
use HPlus\UI\Form;

class Model
{
    /**
     * Eloquent model instance of the grid model.
     *
     * @var EloquentModel|Builder
     */
    protected $model;

    /**
     * @var EloquentModel|Builder
     */
    protected $originalModel;

    /**
     * @var Form
     */
    protected $form;

    public function __construct(EloquentModel $model, Form $form = null)
    {
        $this->model = $model;
        $this->originalModel = $model;
        $this->form = $form;
    }
    public function editData(){
        return $this->model->findOrFail($this->form->getResourceId());
    }

}
