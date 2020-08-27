<?php

namespace App\Models;

class MissingUserContact extends UserContact
{
    protected static $unguarded = true;
    protected $attributes = [];

    public function __construct()
    {
        $this->attributes = [
            'name' => trans('global.not_available'),
            'relation' => trans('global.not_available'),
            'national_id' => trans('global.not_available'),
            'phone' => trans('global.not_available'),
        ];
    }
}
