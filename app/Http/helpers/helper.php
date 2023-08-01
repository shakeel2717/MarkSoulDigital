<?php

use App\Models\Option;
use App\Models\Transaction;

function site_option($key)
{
    $option = Option::where('key', $key)->first();
    return $option->value;
}

function balance($user_id)
{
    $in = Transaction::where('sum', true)->sum('amount');
    $out = Transaction::where('sum', false)->sum('amount');
    return $in - $out;
}
