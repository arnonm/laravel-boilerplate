<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileUniformRequest extends FormRequest
{

    protected $sizes = [];

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        $this->sizes = Factory('App\Models\UserUniform')->make()->allowed_sizes;
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

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
            'pant_size' => ['required', Rule::in($this->sizes)],
            'shirt_size' => ['required', Rule::in($this->sizes)],
            'sweatshirt_size' => ['required', Rule::in($this->sizes)],
            'coat_size' => ['required', Rule::in($this->sizes)],
            'belt_size' => 'required|integer|min:20|max:60',
        ];
    }

    public function attributes()
    {
        return [
            'pant_size' => trans('cruds.user_uniform.fields.pant_size'),
            'belt_size' => trans('cruds.user_uniform.fields.belt_size'),
            'shirt_size' => trans('cruds.user_uniform.fields.shirt_size'),
            'sweatshirt_size' => trans('cruds.user_uniform.fields.sweatshirt_size'),
            'coat_size' => trans('cruds.user_uniform.fields.coat_size'),
        ];
    }
}
