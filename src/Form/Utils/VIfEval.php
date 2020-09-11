<?php
declare(strict_types=1);
/**
 * This file is part of Hyperf.plus
 * @link     https://www.hyperf.plus
 * @document https://doc.hyperf.plus
 * @contact  4213509@qq.com
 * @license  https://github.com/lphkxd/hyperf-plus/blob/master/LICENSE
 */
namespace HPlus\UI\Form\Utils;

use HPlus\UI\Exception\BusinessException;

class VIfEval
{

    protected $functionPath;
    protected $functionStr;
    protected $props = [];

    /**
     * @param mixed $functionPath
     * @return VIfEval
     */
    public function functionPath($functionPath)
    {
        $this->functionPath = $functionPath;
        return $this;
    }

    /**
     * @param mixed $functionStr
     * @return VIfEval
     */
    public function functionStr($functionStr)
    {
        $this->functionStr = $functionStr;
        return $this;
    }

    /**
     * @param array $props
     * @return VIfEval
     */
    public function props(array $props)
    {
        $this->props = $props;
        return $this;
    }


    public function build()
    {
        $expression = "";
        if ($this->functionStr) {
            $expression = $this->functionStr;
        }
        if ($this->functionPath) {
            if (!file_exists($this->functionPath)) {
                throw new BusinessException(400, 'functionPath文件不存在');
            }
            $expression = file_get_contents($this->functionPath);
        }
        return [
            "expression" => $expression,
            "props" => $this->props
        ];
    }
}
