<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrainingSessionRequest extends FormRequest
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
//        dd($this);
        return [
            'name' => 'required',
            'startAt' => 'required',
            'finishAt' => 'after:start_date|required',
        ];
    }

    public function messages()
    {
        // use trans instead on Lang
        return [
            'name.required' => 'Name field is required',
            'start_at.required' => 'Start date field is required',
            'finish_at.required' => 'Finish date field is required',
            'finish_at.date' => 'Please enter a valid finish date',
            'start_at.date' => 'Please enter a valid start date',
            'finish_at.after' => 'Finish date must be after start date',
        ];
    }
}
