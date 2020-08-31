<?php


namespace App\Http\Requests\Frontend\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfileVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'license_plate' => 'required|numeric',
            'manufacturer' => 'required|alpha',
            'manufacturing_date' => 'sometimes|date_format:Y',
            'offroad' => 'boolean',
            'towing' => 'boolean',
            'id' => 'required|exists:users,id',
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
