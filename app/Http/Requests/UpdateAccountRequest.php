<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAccountRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'username' => 'required|min:4|regex:/^[a-z\d_][a-z\d._]*[a-z\d_]$/|unique:users,username,'.Auth::id(),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'We need a valid :attribute.',
            'email.unique' => 'Opss! This :attribute is busy.',
            'username.required' => 'Please enter a :attribute.',
            'username.regex' => 'Your :attribute can contains letters, numbers and Symbols: ._',
            'username.unique' => 'This :attribute is not free.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => 'username',
            'email' => 'email address',
        ];
    }
}
