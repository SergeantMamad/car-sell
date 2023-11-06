@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm bg-neutral-800']) !!}>
