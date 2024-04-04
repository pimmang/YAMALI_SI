<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-2 py-1 bg-orange-500 text-center border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-orange-300    active:bg-orange-700 focus:bg-orange-500 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
