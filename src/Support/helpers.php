<?php


use HPlus\UI\Renderers\Amis;
use HPlus\UI\Renderers\Component;

function admin_user(){

}


if (!function_exists('amis')) {
    /**
     * @param $type
     *
     */
    function amis($type = null)
    {
        if (check_filled($type)) {
            return Component::make()->setType($type);
        }

        return Amis::make();
    }
}

if (!function_exists('admin_url')) {
    /**
     * @param $url
     *
     */
    function admin_url($url = null)
    {
        return $url;
    }
}

if (! function_exists('check_filled')) {
    /**
     * Determine if a value is "filled".
     *
     * @param  mixed  $value
     * @return bool
     */
    function check_filled($value): bool
    {
        return ! check_blank($value);
    }
}

if (! function_exists('check_blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param  mixed  $value
     * @return bool
     */
    function check_blank($value): bool
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}