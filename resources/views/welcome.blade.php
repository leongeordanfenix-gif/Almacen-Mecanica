<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoFix Almacén - Sistema Operativo de Taller</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden min-h-screen">
    <!-- Toast de Notificaciones -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2"></div>

    <!-- BARRA DE NAVEGACIÓN PRINCIPAL (CLARA) -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-3 cursor-pointer" onclick="cambiarVista('inicio')">
            <span class="text-2xl"></span>
            <span class="text-xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent uppercase tracking-wider">
                AutoFix Almacén
            </span>
        </div>

        <nav class="hidden md:flex gap-8 text-xs font-bold uppercase tracking-wider text-slate-600">
            <button onclick="cambiarVista('inventario')" class="hover:text-blue-600 transition flex items-center gap-2">
                <span></span> Inventario General
            </button>
            <button onclick="cambiarVista('registro')" class="hover:text-blue-600 transition flex items-center gap-2">
                <span></span> Ingresar Repuesto
            </button>
            <button onclick="irAModulos()" class="hover:text-blue-600 transition flex items-center gap-2 uppercase">
                Módulos del Administrador
            </button>
        </nav>

        <div class="flex items-center gap-4">
            <button onclick="cambiarVista('acceso')" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-blue-500/20">
                Acceder al Sistema
            </button>
        </div>
    </header>

    <!-- VISTA 1: INICIO Y DIAGNÓSTICO INTEGRADO -->
    <main id="vista-inicio" class="vista-seccion">

        <!-- HERO CON VIDEO EN TONOS CLAROS -->
        <section class="relative w-full min-h-[calc(100vh-5rem)] flex items-center justify-start px-8 md:px-16 pt-24 pb-12 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <video autoplay loop muted playsinline poster="https://images.ctfassets.net/20dhmw20vttc/5ligDlmhxot7MJfiOeL9jG/9090b05177e4fc245d78bede6ba54162/26102SLATE_EXPLODED-HERO_v011_1400x800.jpg" class="w-full h-[105%] object-cover opacity-90">
                    <source src="https://videos.ctfassets.net/20dhmw20vttc/1ZUfWNDEbA00gGjx4kXupd/443f10f89063c118bd0d7603ce6ab22b/26102SLATE_EXPLODED-HERO_v013_1400x800_2mb.webm" type="video/webm">
                    <source src="https://videos.ctfassets.net/20dhmw20vttc/57dmGEwb8ImkA7WJeyyxm2/cc30881fd8cdf15bcb7b4231a282d624/26102SLATE_EXPLODED-HERO_v013_1400x800.mp4" type="video/mp4">
                </video>
                <div class="absolute inset-0 bg-gradient-to-r from-slate-50 via-slate-50/60 to-transparent"></div>
            </div>

            <div class="relative z-10 max-w-2xl space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-blue-100 border border-blue-200 text-blue-800 text-xs font-bold rounded-full uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    Plataforma Unificada de Taller
                </div>

                <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight text-slate-900 leading-tight">
                    Diagnóstico, Stock y Tiempos en un solo lugar.
                </h1>

                <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                    Elimina la desconexión del taller. Conecta el <strong>diagnóstico del mecánico</strong> con la <strong>disponibilidad en almacén</strong> y el <strong>control de tiempos de reparación</strong> en tiempo real.
                </p>

                <!-- INTEGRACIÓN EN 3 PASOS -->
                <div class="grid grid-cols-3 gap-3 pt-2">
                    <div class="p-3 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl shadow-sm">
                        <h4 class="font-bold text-xs text-slate-800 mt-1">1. Diagnóstico</h4>
                        <p class="text-[10px] text-slate-500">Detección de falla</p>
                    </div>
                    <div class="p-3 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl shadow-sm">
                        <h4 class="font-bold text-xs text-slate-800 mt-1">2. Stock</h4>
                        <p class="text-[10px] text-slate-500">Reserva de piezas</p>
                    </div>
                    <div class="p-3 bg-white/90 backdrop-blur-sm border border-slate-200 rounded-xl shadow-sm">
                        <h4 class="font-bold text-xs text-slate-800 mt-1">3. Tiempos</h4>
                        <p class="text-[10px] text-slate-500">Control de entrega</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 pt-2">
                    <button onclick="cambiarVista('inventario')" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-lg shadow-blue-500/20">
                        Consultar Inventario
                    </button>
                    <button onclick="cambiarVista('registro')" class="px-8 py-4 bg-white/90 backdrop-blur-sm hover:bg-slate-100 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-xl border border-slate-300 shadow-sm transition">
                        + Registrar Pieza
                    </button>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DE MÓDULOS -->
        <section id="modulos" class="py-20 px-8 md:px-16 bg-white border-t border-slate-200 space-y-8">
            <div class="flex flex-col md:flex-row justify-between md:items-end gap-4">
                <div>
                    <h2 class="text-3xl font-black uppercase text-slate-900 tracking-tight">Módulos del Almacén</h2>
                    <p class="text-xs text-slate-500 mt-1">Sección reservada para las categorías creadas por el Administrador.</p>
                </div>
                <button onclick="cambiarVista('registro')" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider rounded-xl border border-slate-300 transition">
                    + Crear Nuevo Módulo
                </button>
            </div>

            <!-- CONTENEDOR VACÍO -->
            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-16 text-center space-y-3 bg-slate-50/50">
                <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-xl mx-auto text-slate-500">
                    📦
                </div>
                <h3 class="text-sm font-bold text-slate-700 uppercase">Sin módulos configurados</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto">
                    El administrador del sistema debe crear las categorías y asignar los repuestos o piezas correspondientes.
                </p>
            </div>
        </section>
    </main>

    <!-- VISTA 2: INVENTARIO (CLARA Y ESTRUCTURADA) -->
    <section id="vista-inventario" class="vista-seccion hidden pt-28 pb-16 px-8 md:px-16 max-w-7xl mx-auto space-y-8">
        <div class="flex flex-col md:flex-row justify-between md:items-end gap-4 border-b border-slate-200 pb-6">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Control de Piezas</span>
                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Inventario en Stock</h2>
                <p class="text-xs text-slate-500 mt-1">Disponibilidad conectada en tiempo real con las órdenes de trabajo.</p>
            </div>
            <button onclick="cambiarVista('registro')" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition">
                + Agregar Repuesto
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-16 text-center space-y-4 shadow-sm">
            <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-2xl mx-auto text-slate-400">📋</div>
            <div class="space-y-1">
                <h3 class="text-base font-bold text-slate-800 uppercase">Inventario Vacío</h3>
                <p class="text-xs text-slate-500 max-w-md mx-auto">
                    Aún no hay registros en la base de datos. Completa el formulario de entrada para dar de alta repuestos.
                </p>
            </div>
            <div class="pt-2">
                <button onclick="cambiarVista('inicio')" class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-xs text-slate-700 font-bold uppercase tracking-wider rounded-xl transition border border-slate-200">
                    ← Volver al Inicio
                </button>
            </div>
        </div>
    </section>

    <!-- VISTA 3: REGISTRO DE PIEZAS (FORMULARIO CLARO) -->
    <section id="vista-registro" class="vista-seccion hidden pt-28 pb-16 px-8 md:px-16 max-w-3xl mx-auto space-y-8">
        <div class="border-b border-slate-200 pb-6">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Administración de Stock</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Ingresar Piezas o Módulos</h2>
            <p class="text-xs text-slate-500 mt-1">Asigna piezas a sus respectivos módulos para integrarlos al diagnóstico.</p>
        </div>

        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm space-y-6">
            <form onsubmit="guardarRepuestoDesdeInterfaz(event)" class="space-y-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Nombre del Repuesto / Pieza</label>
                    <input type="text" name="nombre" required placeholder="Ej. Kit de Discos Ventilados" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Código SKU / Referencia</label>
                        <input type="text" name="codigo" required placeholder="Ej. SKU-9901" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Precio Unitario ($)</label>
                        <input type="number" step="0.01" name="precio" required placeholder="45.00" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Stock Inicial</label>
                        <input type="number" name="stock" required placeholder="10" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Tiempo Estimado de Instalación (Minutos)</label>
                        <input type="number" name="tiempo_instalacion" placeholder="45" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-slate-100">
                    <button type="button" onclick="cambiarVista('inicio')" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs uppercase tracking-wider rounded-xl transition">
                        Cancelar
                    </button>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-blue-500/20">
                        Guardar Registro
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- VISTA 4: PANTALLA SISTEMA / ACCESO -->
    <section id="vista-acceso" class="vista-seccion hidden pt-28 pb-16 px-8 md:px-16 max-w-2xl mx-auto space-y-8">
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Gestión del Administrador</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Acceso Operativo</h2>
            <p class="text-xs text-slate-500">Control de roles para administradores y mecánicos.</p>
        </div>

        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm space-y-6">
            <form onsubmit="iniciarSesion(event)" class="space-y-5">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Correo Electrónico</label>
                    <input type="email" name="email" required placeholder="admin@autofix.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Contraseña</label>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-800 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Rol de Acceso</label>
                    <select name="rol" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-700 focus:outline-none focus:border-blue-600 focus:bg-white transition">
                        <option value="admin">Administrador del Sistema</option>
                        <option value="mecanico">Mecánico de Taller</option>
                    </select>
                </div>

                <div class="pt-4 flex items-center justify-between border-t border-slate-100">
                    <button type="button" onclick="cambiarVista('inicio')" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs uppercase tracking-wider rounded-xl transition">
                        Volver al Inicio
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-md shadow-blue-500/20">
                        Ingresar al Sistema
                    </button>
                </div>
            </form>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-200 py-8 text-center text-xs text-slate-400">
        <p>AutoFix Almacén — Plataforma Integrada de Diagnóstico, Inventario y Control de Tiempos</p>
    </footer>

    <!-- SCRIPT DE NAVEGACIÓN Y LÓGICA SPA -->
    <script>
        // Función para mostrar notificaciones Toast profesionales
        function mostrarToast(mensaje, tipo = 'exito') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            const colorBg = tipo === 'exito' 
                ? 'bg-slate-900 border-emerald-500/30 text-emerald-400' 
                : 'bg-slate-900 border-red-500/30 text-red-400';
            
            const icono = tipo === 'exito' 
                ? `<svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`
                : `<svg class="w-4 h-4 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;

            toast.className = `${colorBg} border px-4 py-3 rounded-xl shadow-xl text-xs font-semibold transition-all duration-300 transform translate-y-4 opacity-0 flex items-center gap-3 pointer-events-auto backdrop-blur-md`;
            toast.innerHTML = `${icono} <span class="text-slate-200">${mensaje}</span>`;
            
            container.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            }, 50);

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        // Cambiar entre secciones de la SPA
        function cambiarVista(nombreVista) {
            const vistas = document.querySelectorAll('.vista-seccion');
            vistas.forEach(v => v.classList.add('hidden'));

            const vistaObjetivo = document.getElementById('vista-' + nombreVista);
            if (vistaObjetivo) {
                vistaObjetivo.classList.remove('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            if (nombreVista === 'inventario') {
                cargarInventario();
            }
        }

        // Navegación directa y scroll suave hacia la sección Módulos
        function irAModulos() {
            const vistas = document.querySelectorAll('.vista-seccion');
            vistas.forEach(v => v.classList.add('hidden'));

            const vistaInicio = document.getElementById('vista-inicio');
            if (vistaInicio) {
                vistaInicio.classList.remove('hidden');
            }

            const seccionModulos = document.getElementById('modulos');
            if (seccionModulos) {
                seccionModulos.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Cargar repuestos desde el backend
        async function cargarInventario() {
            const contenedor = document.getElementById('vista-inventario');
            try {
                const response = await fetch('/api/repuestos');
                const data = await response.json();
                const repuestos = data.data || data;

                if (!repuestos || repuestos.length === 0) {
                    contenedor.innerHTML = `
                        <div class="flex flex-col md:flex-row justify-between md:items-end gap-4 border-b border-slate-200 pb-6">
                            <div>
                                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Control de Piezas</span>
                                <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Inventario en Stock</h2>
                            </div>
                            <button onclick="cambiarVista('registro')" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md transition">+ Agregar Repuesto</button>
                        </div>
                        <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center shadow-sm space-y-2">
                            <h3 class="text-base font-bold text-slate-800 uppercase">Inventario Vacío</h3>
                            <p class="text-xs text-slate-500">Aún no hay registros en la base de datos.</p>
                        </div>`;
                    return;
                }

                let filas = repuestos.map(r => `
                    <tr class="border-b border-slate-100 hover:bg-slate-50/80 transition">
                        <td class="px-6 py-4 font-mono font-bold text-blue-600">${r.codigo || 'N/A'}</td>
                        <td class="px-6 py-4 font-bold text-slate-800">${r.nombre}</td>
                        <td class="px-6 py-4 text-center">
                            ${r.stock <= 5 
                                ? `<span class="px-2.5 py-1 bg-red-100 text-red-700 border border-red-200 font-bold rounded-lg">${r.stock} un. (Bajo)</span>`
                                : `<span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold rounded-lg">${r.stock} un.</span>`
                            }
                        </td>
                        <td class="px-6 py-4 font-mono font-bold text-slate-700">$${parseFloat(r.precio).toFixed(2)}</td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="eliminarRepuesto(${r.id})" class="text-xs text-red-600 hover:text-red-800 font-bold transition">Eliminar</button>
                        </td>
                    </tr>
                `).join('');

                contenedor.innerHTML = `
                    <div class="flex flex-col md:flex-row justify-between md:items-end gap-4 border-b border-slate-200 pb-6">
                        <div>
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Control de Piezas</span>
                            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Inventario en Stock</h2>
                        </div>
                        <button onclick="cambiarVista('registro')" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-md transition">+ Agregar Repuesto</button>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                        <table class="w-full text-left text-xs text-slate-600">
                            <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-b border-slate-200 text-[11px] tracking-wider">
                                <tr>
                                    <th class="px-6 py-4">Código</th>
                                    <th class="px-6 py-4">Nombre del Repuesto</th>
                                    <th class="px-6 py-4 text-center">Stock</th>
                                    <th class="px-6 py-4">Precio Unit.</th>
                                    <th class="px-6 py-4 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">${filas}</tbody>
                        </table>
                    </div>`;
            } catch (error) {
                console.error('Error al cargar inventario:', error);
                mostrarToast('No se pudo cargar el inventario.', 'error');
            }
        }

        // Guardar repuesto desde el formulario SPA
        async function guardarRepuestoDesdeInterfaz(e) {
            e.preventDefault();
            const form = e.target;
            
            const payload = {
                nombre: form.querySelector('[name="nombre"]').value,
                codigo: form.querySelector('[name="codigo"]').value,
                stock: parseInt(form.querySelector('[name="stock"]').value) || 0,
                precio: parseFloat(form.querySelector('[name="precio"]').value) || 0.0,
                descripcion: 'Registrado desde la interfaz de usuario'
            };

            try {
                const response = await fetch('/api/repuestos', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                if (response.ok) {
                    mostrarToast('Repuesto registrado correctamente.', 'exito');
                    form.reset();
                    cambiarVista('inventario');
                } else {
                    mostrarToast('Error en la validación de datos.', 'error');
                }
            } catch (error) {
                console.error('Error al guardar:', error);
                mostrarToast('Error de conexión con el servidor.', 'error');
            }
        }

        // Eliminar registro vía API
        async function eliminarRepuesto(id) {
            if (!confirm('¿Desea eliminar permanentemente este registro del almacén?')) return;

            try {
                const response = await fetch(`/api/repuestos/${id}`, {
                    method: 'DELETE',
                    headers: { 'Accept': 'application/json' }
                });

                if (response.ok) {
                    mostrarToast('Registro eliminado correctamente.', 'exito');
                    cargarInventario();
                } else {
                    mostrarToast('No se pudo eliminar el registro.', 'error');
                }
            } catch (error) {
                console.error('Error al eliminar:', error);
                mostrarToast('Error de conexión con el servidor.', 'error');
            }
        }
        
        // Autenticación en sistema
        async function iniciarSesion(e) {
            e.preventDefault();
            const form = e.target;

            const payload = {
                email: form.querySelector('[name="email"]').value,
                password: form.querySelector('[name="password"]').value,
                rol: form.querySelector('[name="rol"]').value
            };

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();

                if (response.ok) {
                    mostrarToast(`Bienvenido ${data.usuario.nombre} (${data.usuario.rol.toUpperCase()})`, 'exito');
                    localStorage.setItem('usuario_sesion', JSON.stringify(data.usuario));
                    form.reset();
                    cambiarVista('inventario');
                } else {
                    mostrarToast(data.message || 'Error de autenticación.', 'error');
                }
            } catch (error) {
                console.error('Error en login:', error);
                mostrarToast('Error de conexión con el servidor.', 'error');
            }
        }
    </script>
</body>
</html>