<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:svg,jpg,jpeg,png', 
            'cetegory_id'=>'required',
            'date'=>'required',
            'address'=>'required',
            'capacity'=>'required',
            'price'=>'required',
        ];
    }
    
    public function message(): array{
        return[
            'title.required'=>'ce champ doit etrev remplit',
            'description.required'=>'ce champ doit etrev remplit',
            'category.required'=>'ce champ doit etrev remplit',
            'date.required'=>'ce champ doit etrev remplit',
            'address.required'=>'ce champ doit etrev remplit',
            'capacity.required'=>'ce champ doit etrev remplit',
            'price.required'=>'ce champ doit etrev remplit',
            'image.image' => 'Le fichier téléchargé doit être une image.',
        ];
    }
}
