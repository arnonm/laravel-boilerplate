<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use \DateTimeInterface;
use Spatie\MediaLibrary\Models\Media;

class UserDetails extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'user_details';

    protected $dates = ['birth_date', 'start_volunteering_date'];

    protected $fillable = ['address', 'address2', 'city', 'postcode', 'cell_phone'];
    protected $casts = [
        'birth_date' => 'date',
        'start_volunteering_date' => 'date',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function registerAllMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl('avatars', 'thumb');
    }

    public function addReplaceAvatar($replace = true)
    {
        if ($replace && $this->getFirstMedia('avatars')) {

            $this->getFirstMedia('avatars')->delete();
        }
        $this->addMediaFromRequest('avatar')->toMediaCollection('avatars');

    }
}
