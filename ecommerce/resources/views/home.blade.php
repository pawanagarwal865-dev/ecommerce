<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{ route('products.show', $product) }}">
                            @if($product->image_path)
                                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
                        </a>
                        <div class="p-6">
                            <h3 class="text-lg font-bold mb-2">
                                <a href="{{ route('products.show', $product) }}" class="hover:text-blue-500">{{ $product->name }}</a>
                            </h3>
                            <p class="text-gray-700 text-base mb-4">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-900 font-bold text-xl">${{ $product->price }}</span>
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
