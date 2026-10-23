<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Repuestos - AutoFix Almacén</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen">

    <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-3">
            <a href="/" class="text-2xl">⚙️</a>
            <h1 class="text-lg font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent uppercase tracking-wider">
                AutoFix Almacén <span class="text-slate-400 font-normal text-xs uppercase tracking-normal">| Control de Stock</span>
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="/" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition uppercase tracking-wider">← Volver al Inicio</a>
            <a href="{{ route('repuestos.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-blue-500/20">
                + Nueva Pieza
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8 space-y-6">

        @if(session('success'))
            <div class="p-4 bg-emerald-100 border border-emerald-300 text-emerald-800 text-xs font-bold rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Módulo de Integración</span>
                <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Inventario en Stock</h2>
                <p class="text-xs text-slate-500">Repuestos ingresados y almacenados en la base de datos MySQL.</p>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-b border-slate-200 text-[11px] tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Código</th>
                        <th class="px-6 py-4">Nombre del Repuesto</th>
                        <th class="px-6 py-4">Descripción</th>
                        <th class="px-6 py-4 text-center">Stock</th>
                        <th class="px-6 py-4">Precio Unit.</th>
                        <th class="px-6 py-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($repuestos as $repuesto)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-mono font-bold text-blue-600">{{ $repuesto->codigo }}</td>
                            <td class="px-6 py-4 font-bold text-slate-800">
                                <a href="{{ route('repuestos.show', $repuesto->id) }}" class="hover:underline">
                                    {{ $repuesto->nombre }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $repuesto->descripcion ?? 'Sin descripción' }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($repuesto->stock <= 5)
                                    <span class="px-2.5 py-1 bg-red-100 text-red-700 border border-red-200 font-bold rounded-lg">{{ $repuesto->stock }} un. (Bajo)</span>
                                @else
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold rounded-lg">{{ $repuesto->stock }} un.</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-slate-700">${{ number_format($repuesto->precio, 2) }}</td>
                            <td class="px-6 py-4 text-right space-x-2 flex justify-end items-center">
                                <a href="{{ route('repuestos.show', $repuesto->id) }}" class="text-blue-600 hover:text-blue-800 font-bold">Ver</a>
                                <form action="{{ route('repuestos.destroy', $repuesto->id) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este repuesto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-400 font-medium">
                                No se encontraron repuestos registrados en la base de datos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $repuestos->links() }}
        </div>

    </main>

</body>
</html>