<a {{ $attributes->merge(['class' => 'inline-block px-6 py-3 text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 rounded-md text-center transition duration-300']) }}
    href="{{ $attributes->get('href', '#') }}">
    {{ $slot }}
</a>
