<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use \DateTimeInterface;
use Spatie\MediaLibrary\Models\Media;
use Hamcrest\Text\IsEmptyString as isEmpty;

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
        return $this->belongsTo(User::class);
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
    private function getAvatarIcon()
    {
        $firstURl = $this->getFirstMediaUrl('avatars', 'thumb');
        if ($firstURl == "") return null;
        return $firstURl;
    }

    public function getAvatarIconAttribute($size = null)
    {
        return ($this->getAvatarIcon() ??
            'https://gravatar.com/avatar/' . md5(strtolower(trim($this->user->email))) .
            '?s=' . config('boilerplate.avatar.size', $size) . '&d=mp');
    }

    public function addReplaceAvatar($replace = true)
    {
        if ($replace && $this->getFirstMedia('avatars')) {

            $this->getFirstMedia('avatars')->delete();
        }
        $this->addMediaFromRequest('avatar')->toMediaCollection('avatars');

    }
}
