<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToUser
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
        Mail::send('mail.user-activity',['user' => $user],function($m) use($user){
            $m->from('info@email.com','admin');
            $m->to($user->email,$user->full_name);
            $m->subject('your activity notification');
        });
    }
}
