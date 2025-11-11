@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#ffcc00] text-sm font-medium leading-5 text-[#ededed] focus:outline-none focus:border-[ffcc00] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-[#ededed] hover:border-[#ffcc0095] focus:outline-none focus:text-[#ededed] focus:border-[#ffcc00] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
