<?php

use App\Models\Option;
use App\Models\Transaction;

function site_option($key)
{
    $option = Option::where('key', $key)->first();
    return $option->value;
}

function balnace($user_id)
{
    $in = Transaction::where('sum', true)->count('amount');
    $out = Transaction::where('sum', false)->count('amount');
    return $in - $out;
}
