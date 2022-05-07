<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePackageRequest extends FormRequest
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
         
                'name' => [
                    'required',
                    'min:3',
                    'max:255',
                    Rule::unique('packages', 'name')->ignore($this->id)
                ],
                'price' =>  'required',
                  
                'number_of_sessions' => ' required'
            ];
      
    }
}
