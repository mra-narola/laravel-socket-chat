<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_message_seen' => 'boolean',
        'reply_id' => 'integer',
    ];

    public function receiverUser() {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function selfUser() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
