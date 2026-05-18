<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/01b3306851.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" style="background-color: #F9FAFB;">
        @include('layouts.includes.admin.navigation')
        @include('layouts.includes.admin.sidebar')
        
        <div class="p-4 sm:ml-64 mt-14">
            @include('layouts.includes.admin.breadcrumb')
            
            <div class="p-4 border-1 border-default border-dashed rounded-base" style="background-color: #F9FAFB;">
                {{ $slot }}
            </div>
        </div>

        @stack('modals')
        @livewireScripts

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Configurar un mixin global para SweetAlert2 con la estética cream-white del proyecto
            const SwalCustom = Swal.mixin({
                customClass: {
                    popup: 'border-2 border-black rounded-base shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] bg-[#F9F3E9] text-black font-sans',
                    title: 'text-lg font-bold text-black pt-4',
                    htmlContainer: 'text-sm text-gray-700 font-medium my-4',
                    confirmButton: 'inline-flex items-center px-4 py-2 text-sm font-bold text-center text-black bg-white border border-black rounded-base hover:bg-black hover:text-[#F9F3E9] transition duration-200 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] mx-2 focus:outline-none cursor-pointer',
                    cancelButton: 'inline-flex items-center px-4 py-2 text-sm font-bold text-center text-gray-700 bg-white border border-gray-300 rounded-base hover:bg-gray-100 transition duration-200 shadow-sm mx-2 focus:outline-none cursor-pointer'
                },
                buttonsStyling: false
            });

            // Escuchar eventos de sesión de Laravel flacheados (para redirecciones de controladores)
            document.addEventListener('DOMContentLoaded', function() {
                @if(session('success'))
                    SwalCustom.fire({
                        icon: 'success',
                        title: '¡Operación Exitosa!',
                        text: "{{ session('success') }}"
                    });
                @elseif(session('error'))
                    SwalCustom.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: "{{ session('error') }}"
                    });
                @elseif(session('swal'))
                    SwalCustom.fire(@json(session('swal')));
                @endif
            });

            // Escuchar eventos personalizados de Livewire 3 (para actualizaciones in-page)
            document.addEventListener('livewire:init', () => {
                Livewire.on('swal', (event) => {
                    const data = Array.isArray(event) ? event[0] : event;
                    SwalCustom.fire({
                        icon: data.icon || 'success',
                        title: data.title || '¡Operación Exitosa!',
                        text: data.text || ''
                    });
                });
            });

            // Interceptar de forma global formularios que tengan la clase 'confirm-action'
            document.addEventListener('submit', function(e) {
                if (e.target && e.target.classList.contains('confirm-action')) {
                    e.preventDefault();
                    const title = e.target.getAttribute('data-confirm-title') || '¿Estás seguro?';
                    const text = e.target.getAttribute('data-confirm-text') || 'Esta acción no se puede deshacer.';
                    const confirmText = e.target.getAttribute('data-confirm-btn') || 'Sí, continuar';
                    
                    SwalCustom.fire({
                        title: title,
                        text: text,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: confirmText,
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            e.target.submit();
                        }
                    });
                }
            });
        </script>
    </body>
</html>
