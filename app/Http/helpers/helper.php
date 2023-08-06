<?php

use App\Models\Option;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
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

function checkUserStatus($user_id)
{
    $user = User::find($user_id);
    if ($user->status == 'active') {
        return true;
    } else {
        return false;
    }
}


function totalIncome($user_id)
{
    $in = Transaction::where('user_id', $user_id)
        ->where('sum', true)
        ->where('status', true)
        ->where('type', '!=', 'Deposit')
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

function myReferrals($user_id)
{
    return leftReferrals($user_id) + rightReferrals($user_id);
}


function leftReferrals($user_id)
{
    $user = User::find($user_id);
    $leftUserCount = 0;
    foreach ($user->getDownline('left') as $leftUser) {
        $leftUserCount++;
    }
    return $leftUserCount;
}


function rightReferrals($user_id)
{
    $user = User::find($user_id);
    $rightUserCount = 0;
    foreach ($user->getDownline('right') as $rightUser) {
        $rightUserCount++;
    }
    return $rightUserCount;
}


function myLeftBusiessVolume($user_id)
{
    $user = User::find($user_id);
    // checking if this user have balid left and right downline
    if ($user->my_left_user_id == null) {
        return 0;
    }
    // checking if both user is active
    if (!checkUserStatus($user->my_left_user_id)) {
        return 0;
    }

    $totalAmount =  0;
    foreach ($user->getMyDownline('left') as $leftUser) {
        if ($leftUser->userPlan) {
            $totalAmount += $leftUser->userPlan->amount;
        }
    }
    return $totalAmount;
}

function myRightBusiessVolume($user_id)
{
    $user = User::find($user_id);
    // checking if this user have balid left and right downline
    if ($user->my_right_user_id == null) {
        return 0;
    }
    $totalAmount =  0;
    foreach ($user->getMyDownline('right') as $rightUser) {
        if ($rightUser->userPlan) {
            $totalAmount += $rightUser->userPlan->amount;
        }
    }
    return $totalAmount;
}

function leftBusiessVolume($user_id)
{
    $user = User::find($user_id);
    $totalAmount =  0;
    foreach ($user->getDownline('left') as $leftUser) {
        if ($leftUser->userPlan) {
            $totalAmount += $leftUser->userPlan->amount;
        }
    }
    return $totalAmount;
}

function rightBusiessVolume($user_id)
{
    $user = User::find($user_id);
    $totalAmount =  0;
    foreach ($user->getDownline('right') as $rightUser) {
        if ($rightUser->userPlan) {
            $totalAmount += $rightUser->userPlan->amount;
        }
    }
    return $totalAmount;
}

function totalMatchingBusiness($user_id)
{
    $leftBV = leftBusiessVolume($user_id);
    $rightBV = rightBusiessVolume($user_id);
    if ($leftBV > $rightBV) {
        return $rightBV;
    } else {
        return $leftBV;
    }
}

function getPackageByAmount($amount)
{
    $plans = Plan::get();
    foreach ($plans as $plan) {
        if ($amount >= $plan->min_price && $amount <= $plan->max_price) {
            return $plan->id;
        }
    }
    abort(500);
}
