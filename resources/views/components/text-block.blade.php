@props(['disabled' => false])

<p {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm']) !!}>{{ $slot }}</p>
