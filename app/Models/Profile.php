<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'provider', 'provider_user_id', 'nickname', 'avatar', 'data'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
