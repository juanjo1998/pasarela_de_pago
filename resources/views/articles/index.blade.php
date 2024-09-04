<x-app-layout>
    <x-container>
        <div class="mx-auto py-6">
            @foreach ($articles as $article)
                <div class="bg-white rounded-lg shadow-md overflow-hidden w-full">
                    <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="{{ $article->title }}">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ $article->title }}</h2>
                        <p class="text-gray-500">{{ Str::limit($article->extract, 120) }}</p>
                        <a href="" class="inline-block mt-4 text-blue-500 hover:text-blue-600 font-semibold">
                            Show more
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-container>
</x-app-layout>
