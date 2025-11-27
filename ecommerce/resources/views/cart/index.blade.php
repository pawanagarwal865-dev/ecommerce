<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(count($cart) > 0)
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantity</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subtotal</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach($cart as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                @if($details['image_path'])
                                                    <div class="flex-shrink-0 w-10 h-10 hidden sm:table-cell">
                                                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('storage/' . $details['image_path']) }}" alt="" />
                                                    </div>
                                                @endif
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $details['name'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">${{ $details['price'] }}</td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <input type="number" value="{{ $details['quantity'] }}" class="w-16 text-center border rounded update-cart" onchange="window.location.href='{{ route('cart.update') }}?id={{ $id }}&quantity=' + this.value">
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">${{ $details['price'] * $details['quantity'] }}</td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="{{ route('cart.remove') }}?id={{ $id }}" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?');">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-right">
                                        <h3><strong>Total ${{ $total }}</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="px-5 py-5 bg-white text-right">
                                        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Continue Shopping</a>
                                        <a href="{{ route('checkout.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Checkout</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <div class="text-center py-10">
                            <p class="text-xl text-gray-600 mb-6">Your cart is empty.</p>
                            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Start Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
