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
    $in = Transaction::where('sum', true)->where('status', true)->sum('amount');
    $out = Transaction::where('sum', false)->where('status', true)->sum('amount');
    return $in - $out;
}
