<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
        return [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:male,female'],
            'birth_date' => ['required', 'date_format:Y-m-d', 'before:today'],
            'photo' => ['required', 'mimetypes:image/jpg,image/png,image/jpeg']
        ];
    }
}
