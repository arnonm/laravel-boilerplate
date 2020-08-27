<?php

namespace App\Models;

class MissingUserUniform extends UserUniform
{
    protected static $unguarded = true;

    protected $attributes = [];

    public function __construct()
    {
        $this->attributes = [
            'pant_size' => trans('global.not_available'),
            'belt_size' => trans('global.not_available'),
            'sweatshirt_size' => trans('global.not_available'),
            'coat_size' => trans('global.not_available'),
            'shirt_size' => trans('global.not_available'),
        ];
    }
}
