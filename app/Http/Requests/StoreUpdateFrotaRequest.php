<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFrotaRequest extends FormRequest
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
            'modelo' => 'required',
            'marca' => 'required',
            'placa' => 'required',
            'ano' => 'required',
            'ativo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'modelo.required' => 'O campo modelo é obrigatório.',
            'marca.required' => 'O campo marca é obrigatório.',
            'placa.required' => 'O campo placa é obrigatório.',
            'ano.required' => 'O campo ano é obrigatório.',
            'ativo.required' => 'O campo ativo é obrigatório.',
        ];
    }
}
