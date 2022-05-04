<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClerkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->clerk === 'city-manager' && $this->user()->can('permission_create_CityManager')) return true;
        elseif ($this->clerk === 'gym-manager' && $this->user()->can('permission_create_GymManager')) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $validationRules=['name'=>['required','max:50'],
            'email'=>['required','unique:users'],
            'password'=>['required','min:8','confirmed'],
            'n_id'=>['required','digits:16', 'unique:city_managers','unique:gym_managers'],
            'avatar'=>['mimetypes:image/jpg,image/png,image/jpeg']];
        if($this->clerk==='city-manager') $validationRules['facility']=['required','exists:cities,id'];
        elseif ($this->clerk==='gym-manager') $validationRules['facility']=['required','exists:gyms,id'];
        return $validationRules;
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.unique'=>'There is already post with the same name',
            'name.max' => 'Title cannot exceed 20 letters',
        ];
    }
}
