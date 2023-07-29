<?php

if (!function_exists('format_date')) {
    function format_date($date, $format = 'd/m/Y')
    {
        return date($format, strtotime($date));
    }
}