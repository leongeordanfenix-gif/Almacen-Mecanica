<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Repuesto;
use App\Http\Requests\StoreRepuestoRequest;
use App\Http\Requests\UpdateRepuestoRequest;

class RepuestoController extends Controller
{
    public function index()
    {
        return Repuesto::paginate(10);
    }

    public function store(StoreRepuestoRequest $request)
    {
        $repuesto = Repuesto::create($request->validated());
        return response()->json($repuesto, 201);
    }

    public function show(Repuesto $repuesto)
    {
        return response()->json($repuesto, 200);
    }

    public function update(UpdateRepuestoRequest $request, Repuesto $repuesto)
    {
        $repuesto->update($request->validated());
        return response()->json($repuesto, 200);
    }

    public function destroy(Repuesto $repuesto)
    {
        $repuesto->delete();
        return response()->json(['message' => 'Eliminado correctamente'], 200);
    }
}