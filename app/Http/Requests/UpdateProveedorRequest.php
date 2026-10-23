<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razon_social' => 'sometimes|required|string|max:255',
            'ruc'          => 'sometimes|required|string|digits:11',
            'telefono'     => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'direccion'    => 'nullable|string|max:255',
        ];
    }
}