<?php


namespace App\Http\Requests\FrontEnd\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfileEmergencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'relation' => 'required:alpha',
            'national_id' => 'sometimes|numeric',
            'phone' => ['required', Rule::phone()->country(['US', 'IL'])->type('mobile')],
            'id' => 'required|exists:users,id',
        ];
    }

    public function attributes()
    {
        return [
            'national_id' => trans('cruds.user_emergency.fields.national_id'),
            'phone' => trans('cruds.user_emergency.fields.phone'),
            'name' => trans('cruds.user_emergency.fields.name'),
            'relation' => trans('cruds.user_emergency.fields.relations'),
        ];
    }
}
