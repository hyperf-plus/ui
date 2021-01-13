<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Grid\Filter;

use Hyperf\Utils\Arr;
use ReflectionFunction;
use HPlus\UI\Components\Form\Input;

class Where extends AbstractFilter
{
    /**
     * Query closure.
     *
     * @var \Closure
     */
    protected $where;

    /**
     * Input value from presenter.
     *
     * @var mixed
     */
    public $input;

    public function __construct(\Closure $query, $label, $column = null)
    {
        $this->where = $query;

        $this->label = $this->formatLabel($label);
        $this->column = $column ?: static::getQueryHash($query, $this->label);

        $this->component = Input::make();
    }

    /**
     * Get the hash string of query closure.
     * @param \Closure $closure
     * @param string $label
     * @return string
     * @throws \ReflectionException
     */
    public static function getQueryHash(\Closure $closure, $label = '')
    {
        $reflection = new ReflectionFunction($closure);

        return md5($reflection->getFileName() . $reflection->getStartLine() . $reflection->getEndLine() . $label);
    }

    /**
     * Get condition of this filter.
     * @param $inputs
     * @return array|void
     * @throws \ReflectionException
     */
    public function condition($inputs)
    {

        $value = Arr::get($inputs, $this->column ?: static::getQueryHash($this->where, $this->label));

        if (is_null($value)) {
            return;
        }

        $this->input = $this->value = $value;

        return $this->buildCondition($this->where->bindTo($this));
    }
}
