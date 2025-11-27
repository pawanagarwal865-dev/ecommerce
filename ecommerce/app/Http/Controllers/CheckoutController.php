<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        if(!$cart || count($cart) == 0) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:500',
        ]);

        $cart = Session::get('cart');
        if(!$cart) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(), // Nullable if guest
            'total_amount' => $total,
            'status' => 'pending',
            'shipping_address' => $request->address,
        ]);

        foreach($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
