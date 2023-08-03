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


function totalIncome($user_id)
{
    $in = Transaction::where('user_id', $user_id)
        ->where('sum', true)
        ->where('status', true)
        ->where('type','!=', 'Deposit')
        ->sum('amount');
    return $in;
}

function getActivePlan($user_id)
{
    $userPlan = UserPlan::where('user_id', $user_id)->where('status', 'active')->sum('amount');
    return $userPlan;
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


function getAllWithdraw($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Withdraw')->sum('amount');
    return $transaction;
}


function getTodayWithdraw($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Withdraw')->whereDate('created_at', Carbon::today())->sum('amount');
    return $transaction;
}


function totalDirectCommission($user_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Direct Commission')->sum('amount');
    return $transaction;
}


function networkCap($user_id)
{
    // getting all income expect deposit
    $in = Transaction::where('user_id', $user_id)
        ->where('sum', true)
        ->where('status', true)
        ->where('type', '!=', 'Deposit')
        ->sum('amount');

    return $in;
}


function networkCapInPercentage($user_id)
{
    // getting all income expect deposit
    $in = Transaction::where('user_id', $user_id)
        ->where('sum', true)
        ->where('status', true)
        ->where('type', '!=', 'Deposit')
        ->sum('amount');
    if ($in < 1) {
        return 0;
    }

    $percentage = ($in / (getActivePlan($user_id) * site_option('networkCap'))) * 100;
    if ($percentage > 100) {
        return 100;
    } else {
        return $percentage;
    }
}
