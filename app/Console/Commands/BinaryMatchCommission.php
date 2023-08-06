<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class BinaryMatchCommission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:binary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // getting all active users
        $users = User::where('status', 'active')->get();
        foreach ($users as $iteration => $user) {
            info($iteration . " Loop");

            info($user->username . "Found");
            // checking this user Binary match value
            // $totalMatchingBusiness = totalMatchingBusiness($user->id);
            // // checking if this value is not 0
            // if ($totalMatchingBusiness < 1) {
            //     info("Value is 0, Skipping");
            //     goto endThisLoop;
            // }

            // info("Value is not Zero");
            // // checking if this user have active plan
            // if ($user->userPlan == "") {
            //     info("Investmetn is 0");
            //     goto endThisLoop;
            // }

            // $profitRatio = $user->userPlan->amount * $user->userPlan->plan->plan_profit->binary_commission / 100;
            // if ($profitRatio > 0) {
            //     // adding deposit request in the system
            //     $user->transactions()->create([
            //         'type' => 'Binary Commission',
            //         'sum' => true,
            //         'status' => true,
            //         'reference' => 'Binary Matching Commission',
            //         'amount' => $profitRatio,
            //     ]);

            //     info("Binary Commission added for " . $user->username . "and Commission is: " . $profitRatio);
            // }

            endThisLoop:
        }
        info("Loop Ended");
    }
}
