@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#3A606E] focus:ring-[#3A606E] rounded-md shadow-sm']) !!}>
