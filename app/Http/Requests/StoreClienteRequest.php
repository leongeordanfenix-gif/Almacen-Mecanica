<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiado a true
    }

    public function rules(): array
    {
        return [
            'nombre'    => 'required|string|max:255',
            'documento' => 'required|string|max:20|unique:clientes,documento',
            'telefono'  => 'nullable|string|max:20',
            'email'     => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:255',
        ];
    }
}