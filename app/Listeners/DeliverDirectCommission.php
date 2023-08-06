<?php

namespace App\Listeners;

use App\Events\PlanActivatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeliverDirectCommission
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlanActivatedEvent $event): void
    {
        $transaction = $event->transaction;
        $userPlan = $event->userPlan;
        // getting this user upliner
        if (auth()->user()->refer != 'default') {
            info("User have valid refer");

            if ($userPlan->user->networker) {
                info("This user is Networker, Skipping Direct Commission.");
                goto EndThisListener;
            }

            // finding the refer
            $sponser = User::where('username', auth()->user()->refer)->first();
            if (!$sponser) {
                goto EndThisListener;
                die();
            }

            // checking if sponser is active
            if ($sponser->status != 'active') {
                goto EndThisListener;
                die();
            }


            // getting direct commission
            $amount = $transaction->amount * $sponser->userPlan->plan->plan_profit->direct_commission / 100;

            $sponser->transactions()->create([
                'type' => "Direct Commission",
                'sum' => true,
                'amount' => $amount,
                'status' => true,
                'reference' => 'Direct Commision from: ' . auth()->user()->username,
            ]);
        }
        // 


        EndThisListener:
    }
}
