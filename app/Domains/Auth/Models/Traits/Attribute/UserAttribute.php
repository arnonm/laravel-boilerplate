<?php

namespace App\Domains\Auth\Models\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password): void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        // Note: Password Histories are logged from the \App\Domains\Auth\Observer\UserObserver class
        $this->attributes['password'] =
            (strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password)) ?
                $password :
                Hash::make($password);
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return (optional($this->details)->avatar_icon);
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if ( !$this->permissions->count()) {
            return 'None';
        }

        return collect($this->getPermissionDescriptions())
            ->implode('<br/>');
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if ( !$this->roles->count()) {
            return 'None';
        }

        return collect($this->getRoleNames())
            ->each(function ($role) {
                return ucwords($role);
            })
            ->implode('<br/>');
    }

    public function getMemberIdAttribute()
    {
        return isset($this->details) && isset($this->details->member_id) ? $this->details->member_id : trans('global.not_available');
    }

    public function getCellPhoneAttribute()
    {
        return isset($this->details) && isset($this->details->cell_phone) ? $this->details->cell_phone : trans('global.not_available');
    }

    public function getAvatarUrlAttribute()
    {
        return isset($this->details) && isset($this->details->avatar_url) ? $this->details->avatar_url : '';
    }

    public function getCardPhotoUrlAttribute()
    {
        return isset($this->details) && isset($this->details->card_photo_url) ? $this->details->card_photo_url : '';
    }

    public function getbirthDateAttribute(): string
    {
        return isset($this->details) && isset($this->details->birth_date) ?
            $this->details->birth_date->format('d-m-Y') :
            trans('global.not_available');
    }


    private function formattedAddress(): string
    {
        $formatted_address = $this->details->address;
        $formatted_address .= ($this->details->address2) ? ", " . $this->details->address2 : '';
        $formatted_address .= ($this->details->city) ? ", " . $this->details->city : '';
        $formatted_address .= ($this->details->postcode) ? ', ' . $this->details->postcode : '';
        return ($this->details->address == trans('global.not_available') ?
            trans('global.not_available') : $formatted_address);

    }

    public function getFormattedAddressAttribute(): string
    {
        if ( !isset($this->details)) {
            return trans('global.not_available');
        }
        if ($this->details->address == trans('global.not_available')) {
            return trans('global.not_available');
        }

        return $this->formattedAddress();
    }

    public function getStartVolunteeringDateAttribute(): string
    {
        return isset($this->details) && isset($this->details->start_volunteering_date) ?
            $this->details->start_volunteering_date->format('d-M-Y') :
            trans('global.not_available');
    }

    public function getGenderAttribute(): string
    {
        if ( !isset($this->details)) {
            return trans('global.not_available');
        }
        if ($this->details->gender == trans('global.not_available')) {
            return trans('global.not_available');
        }
        return trans('cruds.user_details.' . $this->details->gender);
    }

}
