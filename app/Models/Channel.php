<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $primaryKey = 'channel_id';
    protected $fillable = [
        "name",
        "status"
    ];
}
