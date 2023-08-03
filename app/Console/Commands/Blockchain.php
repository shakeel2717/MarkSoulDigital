<?php

namespace App\Console\Commands;

use App\Models\PlanProfit;
use App\Models\Transaction;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Blockchain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockchain:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delivery All Users Profit';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // checking if today is saturday or sunday
        if (Carbon::today()->format('D') == "Sat" || Carbon::today()->format('D') == "Sun") {
            info("Today is Holdiy");
            goto endThisCommand;
        }
        // checking if there's any active user Plans
        $userPlans = UserPlan::where('status', 'active')->get();
        foreach ($userPlans as $userPlan) {
            info($userPlan->user->username . '\'s Active Plan Found');
            info('Plan Amount: ' . $userPlan->amount);
            info('Plan Name: ' . $userPlan->plan->name);
            // delivery profit to this user

            $planProfit = $userPlan->plan->plan_profit->profit;

            // adding deposit request in the system
            // checking if this transaction already inserted
            $transactionQuery = Transaction::where('type', 'Daily ROI')->whereDate('created_at', Carbon::today())->count();
            if ($transactionQuery > 0) {
                info("Already Delivered Skipping");
                goto ThisLoopEnd;
            }

            // checking if this user networkcap is full
            if (networkCapInPercentage($userPlan->user->id) > 99) {
                $userPlan->user->freeze_transactions()->create([
                    'type' => 'Daily ROI',
                    'amount' => $userPlan->amount * $planProfit / 100,
                ]);
                info("ROI Freeezd for the user " . $userPlan->user->username . "Successfully");
            } else {
                $userPlan->user->transactions()->create([
                    'type' => 'Daily ROI',
                    'sum' => true,
                    'status' => true,
                    'reference' => $userPlan->plan->name . ' Plan & Amount :' . number_format($userPlan->amount, 2),
                    'amount' => $userPlan->amount * $planProfit / 100,
                ]);
            }


            info("ROI Delivered to " . $userPlan->user->username . "Successfully");

            ThisLoopEnd:
        }
        endThisCommand:
    }
}
