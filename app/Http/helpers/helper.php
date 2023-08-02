<?php

use App\Models\Option;
use App\Models\Transaction;
use App\Models\UserPlan;
use Carbon\Carbon;

function site_option($key)
{
    $option = Option::where('key', $key)->first();
    return $option->value;
}

function balance($user_id)
{
    $in = Transaction::where('user_id', $user_id)->where('sum', true)->where('status', true)->sum('amount');
    $out = Transaction::where('user_id', $user_id)->where('sum', false)->sum('amount');
    return $in - $out;
}

function getActivePlan($user_id)
{
    $userPlan = UserPlan::where('user_id', $user_id)->where('status', 'active')->latest()->first();
    if ($userPlan != "") {
        return $userPlan;
    } else {
        return false;
    }
}


function totalRoi($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Daily ROI')->sum('amount');
    return $transaction;
}


function todayRoi($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Daily ROI')->whereDate('created_at', Carbon::today())->sum('amount');
    return $transaction;
}
