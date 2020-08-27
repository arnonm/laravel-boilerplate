<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class UserUniform extends Model
{
    protected $sizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];
    protected $fillable = ['pant_size', 'shirt_size', 'belt_size', 'sweatshirt_size', 'coat_size'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSizesAttribute()
    {
        return [
            'XS' => 'XS',
            'S' => 'S',
            'M' => 'M',
            'L' => 'L',
            'XL' => 'XL',
            'XXL' => 'XXL',
        ];
    }

    public function getAllowedSizesAttribute()
    {
        return $this->sizes;
    }
}
