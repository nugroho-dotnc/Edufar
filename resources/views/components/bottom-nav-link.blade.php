@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'btn bg-[#3A606E] border-none my-auto shadow-sm shadow-gray-200 transition text-[#D7E5EA] duration-150 ease-in-out'
                : 'btn bg-[#D7E5EA] text-[#3A606E] border-none border-[#3A606E]  my-auto shadow-sm shadow-gray-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
