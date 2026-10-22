@extends('layouts.app')

@section('title', 'Registrar Repuesto')
@section('page_title', 'Registro de Entrada de Repuesto')

@section('content')
<div class="max-w-2xl bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-6">

    <div class="border-b border-slate-800 pb-4">
        <h2 class="text-lg font-bold text-slate-100">Nuevo Ítem de Almacén</h2>
        <p class="text-xs text-slate-400">Introduce los datos requeridos para registrar el repuesto en el sistema.</p>
    </div>

    <form action="#" method="POST" class="space-y-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Nombre del Repuesto / Herramienta</label>
                <input type="text" placeholder="Ej: Kit de Distribución"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Código SKU</label>
                <input type="text" placeholder="Ej: SKU-MOT-5591"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500 font-mono">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Categoría</label>
                <select class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
                    <option>Motor / Lubricación</option>
                    <option>Sistema de Frenos</option>
                    <option>Suspensión y Dirección</option>
                    <option>Herramientas y Equipos</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Ubicación (Pasillo/Estante)</label>
                <input type="text" placeholder="Ej: Estante B-02"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Cantidad Inicial</label>
                <input type="number" placeholder="10"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Precio Unitario ($)</label>
                <input type="text" placeholder="0.00"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
            </div>
        </div>

        <div class="pt-4 flex gap-3">
            <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-semibold text-sm rounded-xl transition">
                Guardar en Almacén
            </button>
            <a href="/almacen" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 font-medium text-sm rounded-xl transition">
                Cancelar
            </a>
        </div>

    </form>
</div>
@endsection
