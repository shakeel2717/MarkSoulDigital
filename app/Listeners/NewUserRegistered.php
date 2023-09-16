<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use App\Models\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewUserRegistered
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
    public function handle(Registered $event): void
    {
        if (!env('APP_DEBUG')) {
            // info("Sending Welcome to User");
            if ($event->user->email != "") {
                $user  = $event->user;
                Mail::to($event->user->email)->send(new WelcomeEmail($user));
            }
        }

        // sending admin notification
        $notification = new Notification();
        $notification->user_id = 1;
        $notification->title = "New User Registered";
        $notification->description = "New User Registered " . $event->user->username;
        $notification->save();
    }
}
