<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
