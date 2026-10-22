<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Repuestos - AutoFix Almacén</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen">

    <!-- BARRA SUPERIOR CLARA -->
    <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-3">
            <a href="/" class="text-2xl">⚙️</a>
            <h1 class="text-lg font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent uppercase tracking-wider">
                AutoFix Almacén <span class="text-slate-400 font-normal text-xs uppercase tracking-normal">| Control de Stock y Diagnóstico</span>
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="/" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition uppercase tracking-wider">← Volver al Inicio</a>
            <a href="/almacen/nuevo" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-blue-500/20">
                + Nueva Pieza
            </a>
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="max-w-7xl mx-auto px-6 py-8 space-y-6">

        <!-- CABECERA DE SECCIÓN & FILTROS -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Módulo de Integración</span>
                <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Inventario en Stock</h2>
                <p class="text-xs text-slate-500">Repuestos vinculados a ordenes de trabajo y tiempos de taller.</p>
            </div>

            <div class="flex flex-wrap md:flex-nowrap gap-3">
                <input type="text" placeholder="Buscar por SKU o Nombre..." class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs text-slate-800 focus:outline-none focus:border-blue-600 shadow-sm w-64">
                <select class="bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-600 focus:outline-none focus:border-blue-600 shadow-sm">
                    <option value="">Todas las categorías</option>
                    <!-- Los módulos creados por el admin cargarán aquí dinámicamente -->
                    <option value="frenos">Sistema de Frenos</option>
                    <option value="aceites">Aceites & Filtros</option>
                    <option value="tren">Tren Delantero</option>
                </select>
            </div>
        </div>

        <!-- TABLA CLARA DE REPUESTOS -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-b border-slate-200 text-[11px] tracking-wider">
                    <tr>
                        <th class="px-6 py-4">SKU</th>
                        <th class="px-6 py-4">Nombre del Repuesto</th>
                        <th class="px-6 py-4">Módulo / Categoría</th>
                        <th class="px-6 py-4">Ubicación</th>
                        <th class="px-6 py-4 text-center">Tiempo Inst.</th>
                        <th class="px-6 py-4 text-center">Stock</th>
                        <th class="px-6 py-4">Precio Unit.</th>
                        <th class="px-6 py-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">

                    <!-- Fila 1 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-mono font-bold text-blue-600">FRN-001</td>
                        <td class="px-6 py-4 font-bold text-slate-800">Pastillas de Freno Cerámicas Delanteras</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 bg-blue-50 text-blue-700 border border-blue-200 rounded-full font-bold text-[10px]">Sistema de Frenos</span></td>
                        <td class="px-6 py-4 text-slate-500">Estante A-2</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">⏱️ 45 min</td>
                        <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold rounded-lg">14 un.</span></td>
                        <td class="px-6 py-4 font-mono font-bold text-slate-700">$45.00</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-slate-500 hover:text-blue-600 font-bold">Editar</button>
                            <button class="text-red-500 hover:text-red-700">🗑️</button>
                        </td>
                    </tr>

                    <!-- Fila 2 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-mono font-bold text-blue-600">ACT-530</td>
                        <td class="px-6 py-4 font-bold text-slate-800">Aceite Sintético 5W-30 (1 Galón)</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 bg-amber-50 text-amber-700 border border-amber-200 rounded-full font-bold text-[10px]">Aceites & Filtros</span></td>
                        <td class="px-6 py-4 text-slate-500">Pasillo 1 - B3</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">⏱️ 20 min</td>
                        <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold rounded-lg">28 un.</span></td>
                        <td class="px-6 py-4 font-mono font-bold text-slate-700">$32.50</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-slate-500 hover:text-blue-600 font-bold">Editar</button>
                            <button class="text-red-500 hover:text-red-700">🗑️</button>
                        </td>
                    </tr>

                    <!-- Fila 3: Ejemplo de Alerta por Stock Bajo -->
                    <tr class="hover:bg-red-50/50 transition bg-red-50/30">
                        <td class="px-6 py-4 font-mono font-bold text-blue-600">FLT-AIR-02</td>
                        <td class="px-6 py-4 font-bold text-slate-800">Filtro de Aire Alto Flujo</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 bg-amber-50 text-amber-700 border border-amber-200 rounded-full font-bold text-[10px]">Aceites & Filtros</span></td>
                        <td class="px-6 py-4 text-slate-500">Estante A-1</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">⏱️ 15 min</td>
                        <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-red-100 text-red-700 border border-red-200 font-bold rounded-lg">2 un. (Bajo)</span></td>
                        <td class="px-6 py-4 font-mono font-bold text-slate-700">$18.00</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-slate-500 hover:text-blue-600 font-bold">Editar</button>
                            <button class="text-red-500 hover:text-red-700">🗑️</button>
                        </td>
                    </tr>

                    <!-- Fila 4 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-mono font-bold text-blue-600">TRN-AMT-09</td>
                        <td class="px-6 py-4 font-bold text-slate-800">Amortiguador Hidráulico Trasero</td>
                        <td class="px-6 py-4"><span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 border border-indigo-200 rounded-full font-bold text-[10px]">Tren Delantero</span></td>
                        <td class="px-6 py-4 text-slate-500">Rack C-4</td>
                        <td class="px-6 py-4 text-center font-semibold text-slate-600">⏱️ 90 min</td>
                        <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold rounded-lg">8 un.</span></td>
                        <td class="px-6 py-4 font-mono font-bold text-slate-700">$78.90</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-slate-500 hover:text-blue-600 font-bold">Editar</button>
                            <button class="text-red-500 hover:text-red-700">🗑️</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </main>

</body>
</html>
