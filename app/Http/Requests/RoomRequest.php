<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required|max:255',       
            'description' => 'required|max:500',
        ];
    }
    
    public function messages()
    {
        return [
            'hotel_id.required' => 'O hotel é obrigatório.',
            'hotel_id.exists' => 'O hotel selecionado não existe.',
            
            'name.required' => 'O nome do quarto é obrigatório.',
            'name.max' => 'O nome do quarto não pode exceder 255 caracteres.',
            
            'description.required' => 'A descrição do quarto é obrigatória.',
            'description.max' => 'A descrição do quarto não pode exceder 500 caracteres.',
        ];
    }
}
