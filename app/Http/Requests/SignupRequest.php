<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'countrycode' => 'required',
            'phone' => 'required|size:10',
            'username' => 'required|min:4|unique:users,username|regex:/^[a-z\d_][a-z\d._]*[a-z\d_]$/',
            'password' => 'required|min:4',
            'gender' => 'required',
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
            'firstname.required' => ':attribute is required.',
            'lastname.required' => ':attribute is required.',
            'email.required' => 'We need a valid :attribute.',
            'email.unique' => 'Opss! This :attribute is busy.',
            'phone.required' => 'Please enter your :attribute.',
            'username.required' => 'Please enter a :attribute.',
            'username.regex' => 'Your :attribute can contains letters, numbers and Symbols: ._',
            'username.unique' => 'This :attribute is not free.',
            'password.required' => 'The :attribute is necessary.',
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
            'countrycode' => 'code',
            'phone' => 'phone number'
        ];
    }
}
