<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $primaryKey = 'subscription_id';
    protected $fillable = [
        "category_id_foreign",
        "user_id_foreign",
        "channel_id_foreign"
    ];
}
