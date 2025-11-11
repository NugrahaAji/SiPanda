<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#ffcc00] border border-transparent rounded-md font-semibold text-xs text-[#0a0a0a] uppercase tracking-widest hover:bg-[#ffcc0095] focus:bg-[#ffcc00] active:bg-[#ffcc00] focus:outline-none focus:ring-2 focus:ring-[#ffcc00] transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
