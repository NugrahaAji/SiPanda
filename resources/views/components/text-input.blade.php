@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white/10 bg-[#0a0a0a] text-gray-300 focus:border-[#ffcc00] focus:ring-[#ffcc00] rounded-md shadow-sm']) }}>
