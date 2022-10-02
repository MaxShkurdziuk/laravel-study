<?php

namespace App\Http\Requests\Actor;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'first_name' => ['required', 'min:1', 'max:255'],
            'last_name' => ['required', 'min:1', 'max:255'],
            'middle_name' => ['max:255'],
            'birthday' => ['required', 'date'],
            'height' => ['required', 'digits:3']
        ];
    }
}
