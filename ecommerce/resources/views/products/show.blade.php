<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                         @if($product->image_path)
                            <img class="w-full h-auto object-cover rounded" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-1/2 md:pl-10">
                        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                        <p class="text-2xl text-gray-900 font-bold mb-6">${{ $product->price }}</p>
                        <p class="text-gray-700 mb-6">{{ $product->description }}</p>
                        <p class="text-gray-600 mb-6">Stock: {{ $product->stock }}</p>

                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded text-lg w-full md:w-auto">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
