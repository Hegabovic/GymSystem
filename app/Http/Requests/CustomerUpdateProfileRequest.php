<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerUpdateProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $validationRules = [
            'name' => ['max:50'],
            'email' => Rule::unique('users')->ignore($this->id),
            'avatar' => ['mimetypes:image/jpg,image/png,image/jpeg'],
            'birth_date' => 'required',
            'gender' => 'required',

        ];

        return $validationRules;
    }
}
