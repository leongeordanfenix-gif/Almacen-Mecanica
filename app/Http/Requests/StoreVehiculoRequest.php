<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'placa'      => 'required|string|max:10|unique:vehiculos,placa',
            'marca'      => 'required|string|max:100',
            'modelo'     => 'required|string|max:100',
            'anio'       => 'nullable|integer|digits:4',
        ];
    }
}