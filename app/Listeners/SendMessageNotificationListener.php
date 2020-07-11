<?php

namespace App\Listeners;

use App\Events\MessageIsSentEvent;
use App\Notifications\MessageNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendMessageNotificationListener
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
     * @param  MessageIsSentEvent  $event
     * @return void
     */
    public function handle(MessageIsSentEvent $event)
    {
        $recipient = User::find($event->message->recipient_id);
        Notification::send($recipient, new MessageNotification($event->message));
    }
}
