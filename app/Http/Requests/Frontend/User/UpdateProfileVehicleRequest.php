<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'license_plate' => 'required|numeric',
            'manufacturer' => 'required|alpha',
            'manufacturing_date' => 'sometimes|date_format:Y',
            'offroad' => 'boolean',
            'towing' => 'boolean',
        ];
    }

    public function attributes()
    {
        return [
            'license_plate' => trans('cruds.user_vehicle.fields.license_plate'),
            'manufacturer' => trans('cruds.user_vehicle.fields.manufacturer'),
            'manufacturing_date' => trans('cruds.user_vehicle.fields.manufaturing_date'),
            'offroad' => trans('cruds.user_vehicle.fields.offroad'),
            'towing' => trans('cruds.user_vehicle.fields.towing'),
        ];
    }
}
