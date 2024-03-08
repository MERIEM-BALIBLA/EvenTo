<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'pass_confirm'=>'required',
            'role' => 'required'
        ];

        
    }
    public function message(): array{
        return[
            'name.required'=>'ce champ doit etrev remplit',
            'email.required'=>'ce champ doit etrev remplit',
            'password.required'=>'ce champ doit etrev remplit',
            'pass_confirm.required'=>'ce champ doit etrev remplit',

        ];
    }
}
