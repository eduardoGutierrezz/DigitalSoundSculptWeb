@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-gray-900 bg-gray-400 focus:border-indigo-300 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
