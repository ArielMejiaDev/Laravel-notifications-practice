<?php

namespace App;

use App\Events\MessageIsSentEvent;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    protected $dispatchesEvents = [
        'created' => MessageIsSentEvent::class
    ];
}
