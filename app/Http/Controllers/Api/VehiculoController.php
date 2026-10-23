<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use App\Http\Requests\StoreVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;

class VehiculoController extends Controller
{
    public function index()
    {
        return Vehiculo::paginate(10);
    }

    public function store(StoreVehiculoRequest $request)
    {
        $vehiculo = Vehiculo::create($request->validated());
        return response()->json($vehiculo, 201);
    }

    public function show(Vehiculo $vehiculo)
    {
        return response()->json($vehiculo, 200);
    }

    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validated());
        return response()->json($vehiculo, 200);
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return response()->json(['message' => 'Eliminado correctamente'], 200);
    }
}