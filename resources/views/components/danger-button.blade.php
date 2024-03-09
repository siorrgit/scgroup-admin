<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-white']) }}>
    {{ $slot }}
</button>
