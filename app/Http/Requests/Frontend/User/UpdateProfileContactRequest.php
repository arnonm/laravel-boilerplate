<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProfileContactRequest extends FormRequest
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
            'id' => 'required',
            'address' => 'sometimes',
            'address2' => 'sometimes',
            'city' => 'sometimes',
            'postcode' => 'sometimes|numeric',
            'cell_phone' => Rule::phone()->country(['US', 'IL'])->type('mobile'),
        ];
    }

    public function attributes()
    {
        return [
            'postcode' => trans('cruds.user_details.fields.postcode'),
            'cell_phone' => trans('cruds.user_details.fields.cell_phone'),
        ];
    }
}
