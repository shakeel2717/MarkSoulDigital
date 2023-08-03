<?php

namespace App\Listeners;

use App\Events\PlanActivatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeliverFreezeBalance
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
        info("Delivering Freeze Balance to this useer");
        if (auth()->user()->freeze_transactions->sum('amount') > 0) {
            info("User have Balance: " . auth()->user()->freeze_transactions->sum('amount'));
            foreach (auth()->user()->freeze_transactions as $freezeTransaction) {
                $transaction = auth()->user()->transactions()->create([
                    'type' => $freezeTransaction->type,
                    'amount' => $freezeTransaction->amount,
                    'status' => true,
                    'sum' => true,
                    'reference' => "Balance Recover From Freeze Transactions",
                ]);
                if ($transaction) {
                    $freezeTransaction->delete();
                } else {
                    info("Error Deleting Freeze Transction");
                }
            }
        } else {
            info("User not have any Balance in Freez");
        }
    }
}
