<button {{ $attributes->merge(['type' => 'submit', 'class' => '
 text-sm items-center bg-blue-300 text-white p-2 rounded font-bold hover:bg-blue-500 active:bg-blue-600 focus:outline-none focus:border-blue-600  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
