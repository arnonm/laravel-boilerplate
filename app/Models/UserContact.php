<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $fillable = ['name', 'relation', 'national_id', 'phone', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
