<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Components\Attrs;

trait Depend
{
    protected $depend;
    protected $paginate = 0;
    protected $extUrlParams;
    protected $label;

    /**
     * @param mixed $depend
     * @return $this
     */
    public function depend($depend)
    {
        $this->depend = $depend;
        return $this;
    }

    /**
     * @param mixed $paginate
     * @return $this
     */
    public function paginate($paginate)
    {
        $this->paginate = $paginate;
        return $this;
    }
    /**
     * @param mixed $extUrlParams
     * @return $this
     */
    public function extUrlParams($extUrlParams)
    {
        $this->extUrlParams = $extUrlParams;
        return $this;
    }
    /**
     * 远程加载时的默认显示名称，因远程时一般仅有value
     * @param object form 所属表单
     * @param array $label ['key'=>'model','value'=>['value'=>'id','label'=>['title','label']]] // 所属关联模型 用于从data取值
     * @return $this
     */
    public function label(&$form, $label)
    {
        $this->label = $label;
        $form->item($label['key'])->vif('label' . mt_rand(10000, 99999), false);
        return $this;
    }
}
