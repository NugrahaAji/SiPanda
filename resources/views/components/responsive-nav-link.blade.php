@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#ffcc00] text-start text-base text-[#ededed] bg-zinc-800 focus:outline-none focus:text-[#ffcc00]  focus:bg-[#ffcc0010] focus:border-[#ffcc00] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base text-zinc-400 hover:text-[#ededed] hover:bg-[#ffcc0010] focus:outline-none hover:border-[#ffcc0080] focus:text-[#ededed] focus:bg-[#ffcc0010] focus:border-[#ffcc00] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
