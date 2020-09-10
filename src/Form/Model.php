<?php
declare(strict_types=1);
namespace Mzh\UI\Form;


use \Hyperf\Database\Model\Builder;
use \Hyperf\Database\Model\Model as EloquentModel;
use Mzh\UI\Form;

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
