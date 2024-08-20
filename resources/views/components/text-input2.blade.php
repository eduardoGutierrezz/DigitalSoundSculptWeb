
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-blue-900 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
