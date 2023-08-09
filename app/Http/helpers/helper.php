<?php

use App\Models\Option;
use App\Models\Plan;
use App\Models\Reward;
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
    if (!$user) {
        return false;
    }
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
        ->where('type', '!=', 'Freeze Balance Recover')
        ->sum('amount');
    return $in;
}

function getActivePlan($user_id)
{
    $userPlan = UserPlan::where('user_id', $user_id)->where('status', 'active')->sum('amount');
    return $userPlan;
}


function getAllPlansAmount($user_id)
{
    $userPlan = UserPlan::where('user_id', $user_id)->sum('amount');
    return $userPlan;
}


function totalRoi($user_id)
{
    $user = User::find($user_id);
    if (!$user->userPlan) {
        return 0;
    }
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Daily ROI')->where('user_plan_id', $user->userPlan->id)->sum('amount');
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
    $user = User::find($user_id);
    $userPlan = $user->userPlan;
    if ($userPlan == "") {
        return 0;
    }

    return $userPlan->network_cap_transactions->sum('amount') - freezeTransactionRecovered($user_id, $userPlan->id);
}

// gett all freze transaction recover
function freezeTransactionRecovered($user_id, $userPlan_id)
{
    $transaction = Transaction::where('user_id', $user_id)->where('type', 'Freeze Balance')->where('user_plan_id', $userPlan_id)->sum('amount');
    return $transaction;
}



function networkCapInPercentage($user_id)
{
    $userPlan = UserPlan::where('user_id', $user_id)->where('status', 'active')->first();
    if ($userPlan == "") {
        return 0;
    }

    // getting all income expect deposit
    $in = Transaction::where('user_id', $user_id)
        ->where('sum', true)
        ->where('status', true)
        ->where('type', '!=', 'Deposit')
        ->where('created_at', '>=', $userPlan->created_at)
        // ->get();
        ->sum('amount');
    if ($in < 1) {
        return 0;
    }
    $percentage = (($in - freezeTransactionRecovered($user_id, $userPlan->id)) / (getActivePlan($user_id) * site_option('networkCap'))) * 100;
    if ($percentage > 100) {
        return 100;
    } else {
        return $percentage;
    }
}

function myReferrals($user_id)
{
    $user = User::find($user_id);
    $refers = User::where('refer', $user->username)->get();
    $leftUserCount = 0;
    foreach ($refers as $refer) {
        if ($refer->position == 'left' || $refer->position == 'right') {
            $leftUserCount++;
        }
    }
    return $leftUserCount;
}

function leftReferrals($user_id)
{
    $user = User::find($user_id);
    return count($user->getMyDownline('left'));
}


function rightReferrals($user_id)
{
    $user = User::find($user_id);
    return count($user->getMyDownline('right'));
}


function leftBusiessVolume($user_id)
{
    $user = User::find($user_id);
    $totalAmount =  0;
    // getting my direct user if active
    $directRefers = User::where('refer', $user->username)->where('position', 'left')->where('status', 'active')->get();
    foreach ($directRefers as $iteration => $directRefer) {
        if ($directRefer != "") {
            $skipUserId[] = $directRefer->id;
            $totalAmount += $directRefer->userPlan->amount;
            info("Direct Left User Business Added");
        }
    }

    if (checkLeftRightActiveStatus($user_id)) {
        info("both left and Right Active, Digging Depper");
        foreach ($user->getMyDownline('left') as $iteration => $leftUser) {
            if ($leftUser->userPlan != null && $user->userPlan != null) {
                info("pacakge found");
                if (getLeftUserPlanTime($user) < strtotime($leftUser->userPlan->created_at) && $iteration != 0) {
                    info("Loop");
                    if (!in_array($leftUser->id, $skipUserId)) {
                        $totalAmount += $leftUser->userPlan->amount;
                        info("This User Alrady Count");
                    } else {
                        info("This User Alrady Count");
                    }
                } else {
                    info("Else Loop");
                }
            }
        }
    }

    // checking if thsi user left and right both are active

    return $totalAmount;
}

function rightBusiessVolume($user_id)
{
    $user = User::find($user_id);
    $totalAmount =  0;
    // getting my direct user if active
    $directRefers = User::where('refer', $user->username)->where('position', 'right')->where('status', 'active')->get();
    foreach ($directRefers as $iteration => $directRefer) {
        if ($directRefer != "") {
            $skipUserId[] = $directRefer->id;
            $totalAmount += $directRefer->userPlan->amount;
            info("Direct right User Business Added");
        }
    }

    if (checkLeftRightActiveStatus($user_id)) {
        info("both right and Right Active, Digging Depper");
        foreach ($user->getMyDownline('right') as $iteration => $rightUser) {
            if ($rightUser->userPlan != null && $user->userPlan != null) {
                info("pacakge found");
                if (getrightUserPlanTime($user) < strtotime($rightUser->userPlan->created_at) && $iteration != 0) {
                    info("Loop");
                    if (!in_array($rightUser->id, $skipUserId)) {
                        $totalAmount += $rightUser->userPlan->amount;
                        info("This User Alrady Count");
                    } else {
                        info("This User Alrady Count");
                    }
                } else {
                    info("Else Loop");
                }
            }
        }
    }

    // checking if thsi user left and right both are active

    return $totalAmount;
}

function checkLeftRightActiveStatus($user_id)
{
    $user = User::find($user_id);
    $point = 0;
    $directRefers = User::where('refer', $user->username)->where('position', 'left')->where('status', 'active')->get();
    if ($directRefers->count() > 0) {
        $point++;
    }
    $directRefers = User::where('refer', $user->username)->where('position', 'right')->where('status', 'active')->get();
    if ($directRefers) {
        $point++;
    }
    if ($point == 2) {
        return true;
    } else {
        return false;
    }
}


function getLeftUserPlanTime($user)
{
    foreach ($user->getMyDownline('left')  as $leftUser) {
        if ($leftUser->UserPlan != null) {
            return strtotime($leftUser->UserPlan->created_at);
        }
    }
}


function getRightUserPlanTime($user)
{
    foreach ($user->getMyDownline('right')  as $rightUser) {
        if ($rightUser->UserPlan != null) {
            return strtotime($rightUser->UserPlan->created_at);
        }
    }
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


function getBinaryCommission($user_id)
{
    $commission = Transaction::where('user_id', $user_id)->where('type', 'Binary Commission')->where('sum', true)->where('status', true)->sum('amount');
    return $commission;
}


function checkRewardStatus($reward_id, $user_id)
{
    $reward = Reward::find($reward_id);
    $transactions = Transaction::where('user_id', $user_id)->where('reference', $reward->name . ' Reward Achived')->count();
    if ($transactions > 0) {
        return 1;
    } else {
        return 0;
    }
}

function checkFreezeDaysCount($user_id)
{
    $user = User::find($user_id);
    // checking if this freez transaction almost 2 weeks
    if ($user->freeze_transactions->sum('amount') > 0) {
        $firstFreezeTransaction = $user->freeze_transactions->first();
        if (strtotime($firstFreezeTransaction->created_at) < strtotime(now()->addDays(site_option('freeze_transaction_duration')))) {
            info("Transaction Freeze 15 days Found");
            return true;
        }
    }

    return false;
}


function totalDailyRoiCap($user_id)
{
    return getActivePlan($user_id) * site_option('daily_roi_network_x');
}
