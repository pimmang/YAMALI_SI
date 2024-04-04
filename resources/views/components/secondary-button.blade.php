<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'text-orange-500 inline-flex items-center px-2 py-1 bg-white border border-orange-500 rounded-md font-semibold text-xs text-gray-700  hover:bg-orange-500 hover:text-white tracking-widest shadow-sm active:bg-orange-700 focus:outline-none  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
