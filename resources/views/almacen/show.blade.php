@extends('layouts.app')

@section('title', 'Detalle del Repuesto')
@section('page_title', 'Ficha Técnica de Material')

@section('content')
<div class="max-w-4xl space-y-6">

    <!-- Botón regresar -->
    <a href="/almacen" class="text-xs text-slate-400 hover:text-slate-200 flex items-center gap-1">
        ← Volver al Inventario
    </a>

    <!-- Tarjeta Principal del Repuesto -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Ficha técnica básica -->
        <div class="md:col-span-2 space-y-4">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-slate-800 text-slate-400 text-xs rounded-lg font-mono">SKU-BRK-1102</span>
                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs rounded-full font-medium">Stock Bajo</span>
            </div>
            <h2 class="text-2xl font-bold text-slate-100">Pastillas de Freno Cerámicas (Juego Delantero)</h2>
            <p class="text-sm text-slate-400">Compatibilidad: Ford Maverick, Chevy Silverado EV y SUV medianos.</p>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-slate-800 text-sm">
                <div>
                    <span class="text-slate-500 block text-xs">Categoría</span>
                    <span class="font-medium text-slate-200">Sistema de Frenos</span>
                </div>
                <div>
                    <span class="text-slate-500 block text-xs">Ubicación Física</span>
                    <span class="font-medium text-slate-200">Estante C - Pasillo 04</span>
                </div>
                <div>
                    <span class="text-slate-500 block text-xs">Proveedor</span>
                    <span class="font-medium text-slate-200">Brembo Corp.</span>
                </div>
            </div>
        </div>

        <!-- Indicador de Cantidad y Precio -->
        <div class="bg-slate-950/50 border border-slate-800 rounded-xl p-5 flex flex-col justify-between">
            <div>
                <span class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Stock Actual</span>
                <div class="text-4xl font-extrabold text-amber-400 mt-1">3 <span class="text-base font-normal text-slate-400">unid.</span></div>
            </div>
            <div class="pt-4 border-t border-slate-800/80">
                <span class="text-xs text-slate-500">Precio Unitario Estimado</span>
                <div class="text-lg font-bold text-slate-200">$ 78.50 USD</div>
            </div>
        </div>
    </div>

    <!-- Historial de Movimientos (Reflejo del Flujo BPMN) -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-4">
        <h3 class="text-md font-semibold text-slate-200">Trazabilidad de Movimientos (BPMN Almacén)</h3>

        <div class="space-y-3">
            <div class="p-4 bg-slate-950/40 border border-slate-800/60 rounded-xl flex items-center justify-between text-sm">
                <div>
                    <div class="font-medium text-slate-200">Salida para Orden de Trabajo #ORD-882</div>
                    <div class="text-xs text-slate-500">Solicitado por: Mecánico Carlos Pérez • Hace 2 horas</div>
                </div>
                <span class="text-red-400 font-mono text-xs font-semibold">- 2 Unidades</span>
            </div>

            <div class="p-4 bg-slate-950/40 border border-slate-800/60 rounded-xl flex items-center justify-between text-sm">
                <div>
                    <div class="font-medium text-slate-200">Ingreso por Compra Directa</div>
                    <div class="text-xs text-slate-500">Recepción Almacén • Ayer a las 10:30 AM</div>
                </div>
                <span class="text-emerald-400 font-mono text-xs font-semibold">+ 5 Unidades</span>
            </div>
        </div>
    </div>

</div>
@endsection
