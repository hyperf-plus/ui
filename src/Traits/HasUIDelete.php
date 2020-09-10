<?php

namespace Mzh\UI\Traits;


use Mzh\Swagger\Annotation\DeleteApi;
use Mzh\Swagger\Annotation\Path;

trait HasUIDelete
{
    use HasUiBase;

    /**
     * @return array|mixed
     */
    public function delete($id)
    {
        return $this->form(true)->destroy($id);
    }
}