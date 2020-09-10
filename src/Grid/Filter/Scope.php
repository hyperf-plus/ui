<?php
declare(strict_types=1);
namespace Mzh\UI\Grid\Filter;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Scope
{
    const QUERY_NAME = '_scope_';
    const SEPARATOR = '_separator_';

    /**
     * @var string
     */
    public $key = '';

    /**
     * @var string
     */
    protected $label = '';

    /**
     * @var Collection
     */
    protected $queries;

    /**
     * Scope constructor.
     *
     * @param $key
     * @param string $label
     */
    public function __construct($key, $label = '')
    {
        $this->key = $key;
        $this->label = $label ? $label : Str::studly($key);

        $this->queries = new Collection();
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get model query conditions.
     *
     * @return array
     */
    public function condition()
    {
        return $this->queries->map(function ($query) {
            return [$query['method'] => $query['arguments']];
        })->toArray();
    }


    /**
     * @param string $method
     * @param array $arguments
     *
     * @return $this
     */
    public function __call($method, $arguments)
    {
        $this->queries->push(compact('method', 'arguments'));

        return $this;
    }
}
