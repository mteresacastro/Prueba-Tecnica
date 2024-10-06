<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //if user is admin
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'hobbies' => 'required|array|min:1',
        ];
    }
    public function messages()
{
    return [
        'hobbies.required' => 'Debes seleccionar al menos un hobby.',
        'hobbies.min' => 'Debes seleccionar al menos un hobby.',
    ];
}
}
