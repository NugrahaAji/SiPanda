<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 border border-zinc-800 rounded-md font-semibold text-xs text-zinc-400 uppercase tracking-widest shadow-sm hover:bg-zinc-800 hover:text-[#ededed] hover:border-zinc-800 focus:outline-none focus:ring-2 focus:ring-[#ffcc00] disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
