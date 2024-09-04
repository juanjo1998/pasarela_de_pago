<x-app-layout>
    <x-container>
        <div class="mx-auto py-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-2">${{ $product->price }}</p>
                            <p class="text-gray-500 mt-2">{{ Str::limit($product->description, 100) }}</p>
                            <a href=""
                                class="mt-4 inline-block bg-red-400 text-white py-2 px-4 rounded-lg hover:bg-red-300">
                                Ver más
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-container>
</x-app-layout>
