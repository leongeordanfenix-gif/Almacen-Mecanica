<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Repuesto - AutoFix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans p-8 flex justify-center items-center min-h-screen">

    <div class="max-w-2xl w-full bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-6">

        <div class="border-b border-slate-800 pb-4">
            <h2 class="text-lg font-bold text-slate-100">Nuevo Ítem de Almacén</h2>
            <p class="text-xs text-slate-400">Introduce los datos requeridos para guardar el repuesto en la base de datos MySQL.</p>
        </div>

        @if ($errors->any())
            <div class="p-4 bg-red-900/50 border border-red-500/50 text-red-200 text-xs rounded-xl space-y-1">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('repuestos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1">Nombre del Repuesto</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Kit de Distribución" required
                        class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1">Código / SKU</label>
                    <input type="text" name="codigo" value="{{ old('codigo') }}" placeholder="Ej: SKU-MOT-5591" required
                        class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500 font-mono">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Descripción</label>
                <textarea name="descripcion" placeholder="Descripción detallada del repuesto" rows="2"
                    class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">{{ old('descripcion') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1">Stock Inicial</label>
                    <input type="number" name="stock" value="{{ old('stock', 0) }}" placeholder="10" required
                        class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1">Precio Unitario ($)</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="0.00" required
                        class="w-full px-4 py-2 bg-slate-950 border border-slate-800 rounded-xl text-slate-200 text-sm focus:outline-none focus:border-amber-500">
                </div>
            </div>

            <div class="pt-4 flex gap-3">
                <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-semibold text-sm rounded-xl transition">
                    Guardar en Almacén
                </button>
                <a href="{{ route('repuestos.index') }}" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 font-medium text-sm rounded-xl transition">
                    Cancelar
                </a>
            </div>

        </form>
    </div>

</body>
</html>