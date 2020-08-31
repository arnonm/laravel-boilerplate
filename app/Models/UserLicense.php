<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserLicense extends Model
{
    protected $dates = ['expiration_date'];
    protected $table = 'user_licenses';
    protected $fillable = ['number', 'year', 'type', 'expiration_date'];

    public function getIsExpiredAttribute()
    {
        return $this->expiration_date <= now();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpiresAttribute()
    {
        return (($this->expiration_date == null) ? trans('global.not_available') : $this->expiration_date->format('d-m-Y'));
    }

    public function getLicenseTypeAttribute()
    {
        return ($this->type == trans('global.not_available') ? trans('global.not_available') :
            trans('cruds.user_license.type.' . $this->type));

    }

    public function getLicenseTypesAttribute()
    {
        return [
            'A' => trans('cruds.user_license.type.A'),
            'B' => trans('cruds.user_license.type.B'),
            'C' => trans('cruds.user_license.type.C'),
            'D' => trans('cruds.user_license.type.D'),
            'AMB' => trans('cruds.user_license.type.AMB'),
        ];
    }
}
