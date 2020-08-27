<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileLicenseRequest extends FormRequest
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
            'number' => 'required|numeric',
            'year' => 'required|date_format:Y',
            'type' => Rule::in('A', 'B', 'C', 'D', 'AMB'),
            'expires' => 'required|date_format:d-m-Y',
        ];
    }

    public function attributes()
    {
        return [
            'number' => trans('cruds.user_license.fields.number'),
            'year' => trans('cruds.user_license.fields.year'),
            'type' => trans('cruds.user_license.fields.type'),
            'expires' => trans('cruds.user_license.fields.expiration_date'),
        ];
    }
}
