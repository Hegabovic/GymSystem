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
        $validationRules=[
        'name'=>['max:50'],
            'email'=>[
        Rule::unique('users')->ignore($this->user()->id)],

            'avatar'=>['mimetypes:image/jpg,image/png,image/jpeg']
        ];
        if($this['password'] !=null) $validationRules['password']=['min:8','confirmed'];
        return $validationRules;
    }
}
