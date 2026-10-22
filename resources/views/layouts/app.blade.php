<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén Mecánico - @yield('title', 'Sistema')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex">

    <!-- Sidebar / Menú Lateral -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-800">
                <span class="text-xl font-bold bg-gradient-to-r from-amber-500 to-orange-400 bg-clip-text text-transparent">
                    ⚙️ AutoFix Stock
                </span>
            </div>
            <nav class="p-4 space-y-2">
                <a href="/almacen" class="flex items-center gap-3 px-4 py-3 text-slate-200 bg-slate-800 rounded-xl font-medium hover:bg-slate-700 transition">
                    📦 Inventario / Piezas
                </a>
                <a href="/almacen/nuevo" class="flex items-center gap-3 px-4 py-3 text-slate-400 rounded-xl font-medium hover:bg-slate-800 hover:text-slate-200 transition">
                    ➕ Registrar Repuesto
                </a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-800 text-xs text-slate-500">
            Almacén Mecánico v1.0
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="h-16 bg-slate-900/50 backdrop-blur border-b border-slate-800 flex items-center justify-between px-6">
            <h1 class="text-lg font-semibold text-slate-200">@yield('page_title', 'Panel de Control')</h1>
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-sm text-slate-400">Jefe de Almacén</span>
            </div>
        </header>

        <!-- Dynamic Content -->
        <main class="p-6 flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
