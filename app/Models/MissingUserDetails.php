<?php


namespace App\Models;


class MissingUserDetails extends UserDetails
{
    protected static $unguarded = true;

    protected $attributes = [];

    public function __construct()
    {
        $this->attributes = [
            'gender' => trans('global.not_available'),
            'national_id' => trans('global.not_available'),
            'cell_phone' => trans('global.not_available'),
//            'birth_date' => trans('global.not_available'),
            'address' => trans('global.not_available'),
            'address2' => trans('global.not_available'),
            'city' => trans('global.not_available'),
            'postcode' => trans('global.not_available'),
            'card_photo_url' => trans('global.not_available'),
            'avatar_url' => trans('global.not_available'),
//            'start_volunteering_date' => trans('global.not_available'),
            'branch_id' => trans('global.not_available'),

        ];
    }
}
