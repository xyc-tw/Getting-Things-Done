@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:ring-0 focus:ring-offset-0 text-xs rounded border bg-gray-100 border-gray-300 p-2 focus:outline-none focus:border-gray-400 active:outline-none active:border-gray-400']) !!}>
