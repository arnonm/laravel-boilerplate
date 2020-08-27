<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    protected $casts = [
        'offroad' => 'boolean',
        'towing' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
