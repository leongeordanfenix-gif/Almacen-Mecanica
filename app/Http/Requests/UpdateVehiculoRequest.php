<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => 'sometimes|required|exists:clientes,id',
            'placa'      => 'sometimes|required|string|max:10',
            'marca'      => 'sometimes|required|string|max:100',
            'modelo'     => 'sometimes|required|string|max:100',
            'anio'       => 'nullable|integer|digits:4',
        ];
    }
}