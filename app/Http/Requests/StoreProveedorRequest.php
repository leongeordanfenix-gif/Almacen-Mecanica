<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razon_social' => 'required|string|max:255',
            'ruc'          => 'required|string|digits:11|unique:proveedores,ruc',
            'telefono'     => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'direccion'    => 'nullable|string|max:255',
        ];
    }
}