<?php

use App\Models\Option;

function site_option($key)
{
    $option = Option::where('key',$key)->first();
    return $option->value;
}
