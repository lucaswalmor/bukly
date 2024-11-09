<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name' => 'required|string|unique:hotels,name',
            'zip_code' => 'required|string|size:10',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|size:2',
            'website' => 'nullable|url',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'O nome do hotel é obrigatório.',
            'name.unique' => 'O nome do hotel já existe.',
            'name.string' => 'O nome do hotel deve ser uma string.',

            'zip_code.required' => 'O CEP é obrigatório.',
            'zip_code.size' => 'O CEP deve ter exatamente 10 caracteres.',

            'address.required' => 'O endereço é obrigatório.',
            'address.string' => 'O endereço deve ser uma string.',

            'city.required' => 'A cidade é obrigatória.',
            'city.string' => 'A cidade deve ser uma string.',

            'state.required' => 'O estado é obrigatório.',
            'state.size' => 'O estado deve ter exatamente 2 caracteres.',

            'website.url' => 'O campo website deve ser uma URL válida.',
        ];
    }
}
