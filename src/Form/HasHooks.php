<?php
declare(strict_types=1);
namespace Mzh\UI\Form;

use Closure;
use Hyperf\HttpMessage\Server\Response;
use Hyperf\Utils\Arr;

trait HasHooks
{
    /**
     * Supported hooks: submitted, editing, saving, saved, deleting, deleted.
     *
     * @var array
     */
    protected $hooks = [];

    /**
     * Register a hook.
     *
     * @param string $name
     * @param Closure $callback
     *
     * @return $this
     */
    protected function registerHook($name, Closure $callback)
    {
        $this->hooks[$name][] = $callback;
        return $this;
    }

    /**
     * Call hooks by giving name.
     *
     * @param string $name
     * @param array $parameters
     *
     * @return Response
     */
    protected function callHooks($name, $parameters = [])
    {
        $hooks = Arr::get($this->hooks, $name, []);
        foreach ($hooks as $func) {
            if (!$func instanceof Closure) {
                continue;
            }
            $response = call_user_func($func, $this, $parameters);
            if ($response instanceof Response) {
                return $response;
            }
        }
    }

    /**
     * Set after getting editing model callback.
     *
     * @param Closure $callback
     *
     * @return $this
     */
    public function editing(Closure $callback)
    {
        return $this->registerHook('editing', $callback);
    }

    public function editQuery(Closure $callback)
    {
        return $this->registerHook('editQuery', $callback);
    }

    /**
     * Set submitted callback.
     *
     * @param Closure $callback
     *
     * @return $this
     */
    public function submitted(Closure $callback)
    {
        return $this->registerHook('submitted', $callback);
    }

    /**
     * Set saving callback.
     *
     * @param Closure $callback
     *
     * @return $this
     */
    public function saving(Closure $callback)
    {
        return $this->registerHook('saving', $callback);
    }

    /**
     * Set saved callback.
     *
     * @param Closure $callback
     *
     * @return $this
     */
    public function saved(Closure $callback)
    {
        return $this->registerHook('saved', $callback);
    }

    /**
     * 数据事务处理时回调
     * @param Closure $callback
     * @return HasHooks
     */
    public function DbTransaction(Closure $callback)
    {
        return $this->registerHook('DbTransaction', $callback);
    }

    /**
     * 表单验证时回调
     * @param Closure $callback
     * @return HasHooks
     */
    public function validating(Closure $callback)
    {
        return $this->registerHook('validating', $callback);
    }

    /**
     * @param Closure $callback
     *
     * @return $this
     */
    public function deleting(Closure $callback)
    {
        return $this->registerHook('deleting', $callback);
    }

    /**
     * @param Closure $callback
     *
     * @return $this
     */
    public function deleted(Closure $callback)
    {
        return $this->registerHook('deleted', $callback);
    }

    /**
     * Call editing callbacks.
     *
     * @param $id
     * @return mixed
     */
    protected function callEditing($id)
    {
        return $this->callHooks('editing', $id);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function callEdiQuery($data)
    {
        return $this->callHooks('editQuery', $data);
    }

    /**
     * Call submitted callback.
     *
     * @return mixed
     */
    protected function callSubmitted()
    {
        return $this->callHooks('submitted');
    }

    /**
     * Call saving callback.
     *
     * @return mixed
     */
    protected function callSaving()
    {
        return $this->callHooks('saving');
    }

    /**
     * Callback after saving a Model.
     *
     * @return mixed|null
     */
    protected function callSaved()
    {
        return $this->callHooks('saved');
    }

    /**
     * Call hooks when deleting.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    protected function callDeleting($id)
    {
        return $this->callHooks('deleting', $id);
    }

    /**
     * @return mixed
     */
    protected function callDeleted()
    {
        return $this->callHooks('deleted');
    }

    protected function callDbTransaction()
    {
        return $this->callHooks('DbTransaction');
    }

    protected function callValidating($validator)
    {
        return $this->callHooks('validating', $validator);
    }

}
