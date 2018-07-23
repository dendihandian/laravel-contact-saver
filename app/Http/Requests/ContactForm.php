<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
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
            'group_id' => 'nullable|integer',
            'first_name' => 'nullable|string|min:2|max:64',
            'middle_name' => 'nullable|string|min:2|max:64',
            'last_name' => 'required|string|min:2|max:64',
            'email' => 'nullable|string|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}
