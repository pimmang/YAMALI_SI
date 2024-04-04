@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-orange-500  text-dark-700 focus:border-orange-500  focus:ring-orange-500  rounded-md shadow-sm',
]) !!}>
