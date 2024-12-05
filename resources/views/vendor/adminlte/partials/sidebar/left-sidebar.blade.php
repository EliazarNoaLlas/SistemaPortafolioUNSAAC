{{--
Archivo: left-sidebar.blade.php
Propósito: Definir y renderizar la barra lateral izquierda en el panel administrativo de la aplicación.
Autor: Walter Stefano
Última Modificación: 2 de diciembre de 2024
--}}

<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">
    {{--
    El componente <aside> representa la barra lateral principal.
    La clase CSS es configurada dinámicamente utilizando valores definidos en el archivo de configuración `adminlte.php`.
    Por defecto, aplica el estilo `sidebar-dark-primary` con una elevación de sombra nivel 4.
    --}}

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        {{--
        Si existe una configuración para un logo extendido (`logo_img_xl`), se incluye el archivo de plantilla `brand-logo-xl`.
        Este archivo probablemente contiene un logo de mayor tamaño que se mostrará en la barra lateral.
        --}}
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        {{--
        Si no se encuentra configurado el logo extendido, se incluye un logo más pequeño desde el archivo `brand-logo-xs`.
        --}}
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Contenedor para el contenido del menú de la barra lateral --}}
    <div class="sidebar">
        {{-- Sección de navegación dentro de la barra lateral --}}
        <nav class="pt-2">
            {{-- Tarjeta de bienvenida para el usuario actual --}}
            <div class="card">
                {{-- Cuerpo de la tarjeta que da la bienvenida al usuario --}}
                <div class="card-body text-center">
                    {{-- Muestra un título de bienvenida --}}
                    <h5 class="card-title"><b>¡Bienvenido!</b></h5>
                </div>
                {{-- Lista de elementos relacionados con el usuario --}}
                <ul class="list-group list-group-flush rounded">
                    {{-- Elemento que muestra el nombre completo del usuario autenticado --}}
                    <li class="list-group-item text-center bg-warning">
                        {{ Auth::user()->nombres . ' ' . Auth::user()->apellido_paterno . ' ' . Auth::user()->apellido_materno }}
                    </li>
                    {{--
                    Si existe una sesión activa con una variable de rol actual (`current_role`), se muestra su valor en la tarjeta.
                    --}}
                    @if (session('current_role'))
                        <li class="list-group-item text-center bg-secondary">
                            <span>{{ session('current_role') }}</span>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Lista de navegación dinámica configurada para la barra lateral --}}
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                {{-- Propiedad para activar funcionalidad de árbol en la lista --}}
                data-widget="treeview" role="menu"
                {{-- Configuración opcional para la velocidad de animación del menú desplegable --}}
                @if (config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                {{-- Configuración para habilitar o deshabilitar la funcionalidad de acordeón en la barra lateral --}}
                @if (!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>

                {{-- Generación de los enlaces del menú desde la configuración --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
                {{--
                Itera sobre los elementos del menú configurados en `adminlte.php`.
                Por cada elemento, incluye la plantilla `menu-item` que renderiza el enlace correspondiente.
                --}}
            </ul>
        </nav>
    </div>
</aside>
