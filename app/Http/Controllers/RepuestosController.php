<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;
use App\Http\Requests\StoreRepuestoRequest;
use App\Http\Requests\UpdateRepuestoRequest;

class RepuestosController extends Controller
{
    public function index()
    {
        $repuestos = Repuesto::paginate(10);
        return view('almacen.index', compact('repuestos'));
    }

    public function create()
    {
        return view('almacen.create');
    }

    public function store(StoreRepuestoRequest $request)
    {
        Repuesto::create($request->validated());
        return redirect()->route('repuestos.index')->with('success', 'Repuesto registrado correctamente.');
    }

    public function show(string $id)
    {
        $repuesto = Repuesto::findOrFail($id);
        return view('almacen.show', compact('repuesto'));
    }

    public function edit(string $id)
    {
        $repuesto = Repuesto::findOrFail($id);
        return view('almacen.edit', compact('repuesto'));
    }

    public function update(UpdateRepuestoRequest $request, string $id)
    {
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->update($request->validated());
        return redirect()->route('repuestos.index')->with('success', 'Repuesto actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $repuesto = Repuesto::findOrFail($id);
        $repuesto->delete();
        return redirect()->route('repuestos.index')->with('success', 'Repuesto eliminado del almacén.');
    }
}