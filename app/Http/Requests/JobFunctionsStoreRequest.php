<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobFunctionsStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'salary' => ['required', 'numeric'],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_time' => ['required', 'date_format:H:i:s'],
            'time_output_interval' => ['required', 'date_format:H:i:s'],
            'time_entry_interval' => ['required', 'date_format:H:i:s'],
        ];
    }
}