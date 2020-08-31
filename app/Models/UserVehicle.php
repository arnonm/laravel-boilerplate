<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    protected $casts = [
        'offroad' => 'boolean',
        'towing' => 'boolean',
    ];
    protected $fillable = ['license_plate', 'manufacturer', 'manufacturing_date', 'offroad', 'towing', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
