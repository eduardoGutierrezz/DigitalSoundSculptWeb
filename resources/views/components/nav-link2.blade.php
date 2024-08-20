@props(['active'])
<!--Estilos para links de selectores de las graficas de la barra de menú negra-->
@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-100 hover:text-orange-500 hover:border-gray-300 focus:outline-none focus:text-red-500 focus:border-gray-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-100 hover:text-orange-500 hover:border-gray-300 focus:outline-none focus:text-red-500 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>