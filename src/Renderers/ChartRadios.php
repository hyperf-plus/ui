<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace HPlus\UI\Renderers;

/**
 * ChartRadios 图表单选框.
 *
 * @version 6.2.2
 */
class ChartRadios extends BaseRenderer
{
    public function __construct()
    {
        $this->set('type', 'chart-radios');
    }

    /**
     * 图表数值字段名.
     * @param mixed $value
     */
    public function chartValueField($value = '')
    {
        return $this->set('chartValueField', $value);
    }

    /**
     * 图表配置.
     * @param mixed $value
     */
    public function config($value = '')
    {
        return $this->set('config', $value);
    }

    /**
     * 高亮的时候是否显示 tooltip.
     * @param mixed $value
     */
    public function showTooltipOnHighlight($value = true)
    {
        return $this->set('showTooltipOnHighlight', $value);
    }

    /**
     * 指定为 chart-radios 渲染器。
     * @param mixed $value
     */
    public function type($value = 'chart-radios')
    {
        return $this->set('type', $value);
    }
}
