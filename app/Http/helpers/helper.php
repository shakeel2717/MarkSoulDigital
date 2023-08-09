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
    if ($user->left_user == "") {
        return $totalAmount;
    }
    // checking if this user left and left is active
    if ($user->left_user->status != 'active') {
        return $totalAmount;
    }

    // getting this user business
    $totalAmount += $user->left_user->userPlan->amount;
    foreach ($user->getDownline('left') as $iteration => $leftUser) {
        if ($leftUser->userPlan != null && $user->userPlan != null) {
            if (getLeftUserPlanTime($user) < strtotime($leftUser->userPlan->created_at) && $leftUser->userPlan->user_id != $user->left_user->id) {
                $totalAmount += $leftUser->userPlan->amount;
                info("This User Plan Created" . strtotime($leftUser->userPlan->created_at));
                info("Left Real Plan Created" . getLeftUserPlanTime($user));
                info("User:" . $leftUser->name);
                info("Amount Added" . $totalAmount);
            } else {
                info("Plan NOt Greater");
            }
        }
    }
    return $totalAmount;
}


function getLeftUserPlanTime($user)
{
    foreach ($user->getDownline('left')  as $leftUser) {
        if ($leftUser->UserPlan != null) {
            return strtotime($leftUser->UserPlan->created_at);
        }
    }
}


function getRightUserPlanTime($user)
{
    foreach ($user->getDownline('right')  as $rightUser) {
        if ($rightUser->UserPlan != null) {
            return strtotime($rightUser->UserPlan->created_at);
        }
    }
}

function rightBusiessVolume($user_id)
{
    $user = User::find($user_id);
    $totalAmount =  0;
    if ($user->right_user == "") {
        return $totalAmount;
    }
    // checking if this user right and right is active
    if ($user->right_user->status != 'active') {
        return $totalAmount;
    }

    // getting this user business
    $totalAmount += $user->right_user->userPlan->amount;
    foreach ($user->getDownline('right') as $iteration => $rightUser) {
        if ($rightUser->userPlan != null && $user->userPlan != null) {
            if (getRightUserPlanTime($user) < strtotime($rightUser->userPlan->created_at) && $rightUser->userPlan->user_id != $user->right_user->id) {
                $totalAmount += $rightUser->userPlan->amount;
                info("This User Plan Created" . strtotime($rightUser->userPlan->created_at));
                info("right Real Plan Created" . getRightUserPlanTime($user));
                info("User:" . $rightUser->name);
                info("Amount Added" . $totalAmount);
            } else {
                info("Plan NOt Greater");
            }
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
