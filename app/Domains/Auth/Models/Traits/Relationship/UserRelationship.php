<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use App\Models\MissingUserDetails;
use App\Models\MissingUserLicense;
use App\Models\MissingUserUniform;
use App\Models\UserContact;
use App\Models\UserDetails;
use App\Models\UserLicense;
use App\Models\UserUniform;
use App\Models\UserVehicle;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    public function details()
    {
        return $this->hasOne(UserDetails::class)
            ->withDefault(MissingUserDetails::make(['id' => $this->id])->toArray());
    }

    public function license()
    {
        return $this->hasOne(UserLicense::class)
            ->withDefault(MissingUserLicense::make(['id' => $this->id])->toArray());
    }

    public function contacts()
    {
        return $this->hasMany(UserContact::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function uniform()
    {
        return $this->hasOne(UserUniform::class)
            ->withDefault(MissingUserUniform::make(['id' => $this->id])->toArray());
    }

    public function vehicles()
    {
        return $this->hasMany(UserVehicle::class);
    }
}
