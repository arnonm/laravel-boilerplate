<?php


namespace App\Models;

class MissingUserLicense extends UserLicense
{
    protected static $unguarded = true;

    protected $attributes = [];

    public function __construct()
    {
        $this->attributes = [
            'year' => trans('global.not_available'),
            'type' => trans('global.not_available'),
            'number' => trans('global.not_available'),
//            'expiration_date' => trans('global.not_available'),
        ];
    }
}
