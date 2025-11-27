<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order #{{ $order->id }} Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-2">Customer Info</h3>
                        <p><strong>Name:</strong> {{ $order->user ? $order->user->name : 'Guest' }}</p>
                        <p><strong>Email:</strong> {{ $order->user ? $order->user->email : 'N/A' }}</p>
                        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-2">Order Items</h3>
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantity</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->product->name }}</td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->quantity }}</td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">${{ $item->price }}</td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">${{ $item->quantity * $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-right text-xl font-bold">
                        Total: ${{ $order->total_amount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
