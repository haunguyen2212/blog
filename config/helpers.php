<?php

use App\Models\Category;
use App\Models\Tag;

if (!function_exists('format_date')) {
    function format_date($date, $format = 'd/m/Y')
    {
        return date($format, strtotime($date));
    }
}

if (!function_exists('category_dropdown')) {
    function category_dropdown()
    {
        return ['' => 'Chọn danh mục'] + Category::where('is_delete', 0)->pluck('name', 'id')->toArray();
    }
}

if (!function_exists('tag_checkbox')) {
    function tag_checkbox()
    {
        return Tag::where('is_delete', 0)->pluck('name', 'id')->toArray();
    }
}