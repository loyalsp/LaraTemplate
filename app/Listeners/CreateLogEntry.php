<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\UserActivity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateLogEntry
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $user = $event->user;
        $entry  = UserActivity::where('user_id',$user->id)->first();
        if(is_null($entry))
        {
            $log_entry = new UserActivity();
            $log_entry->user_id = $user->id;
            $log_entry->log_in_time = new \DateTime('Asia/Karachi');
            $log_entry->save();
            return;
        }
        $entry->log_in_time = new \DateTime('Asia/Karachi');
       $entry->update();
    }
}
