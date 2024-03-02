<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationMessage extends Model
{
    use HasFactory;
    protected $primaryKey = 'notification_message_id';
    protected $fillable = [
        "message",
        "subscription_id_foreign"
    ];
}
