<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartItems;
    public $totalPrice;
    public $snapToken;

    #[On('cartUpdated')]
    public function mount()
    {
        if (!Auth::check()) {
            return $this->cartItems = collect([]);
        }
        $this->cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $this->totalPrice = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }

    public function increment($productId)
    {
        Cart::where('product_id', $productId)->where('user_id', Auth::user()->id)->increment('quantity');
        $this->cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $this->totalPrice = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }

    public function decrement($productId)
    {
        $cart = Cart::where('product_id', $productId)->where('user_id', Auth::user()->id)->first();
        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        } else {
            $cart->delete();
        }
        $this->cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $this->totalPrice = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    }

    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        $this->cartItems = collect([]);
        $this->totalPrice = 0;
    }

    public function checkout()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $this->totalPrice,
            ),
            'item_details' => $this->cartItems->map(function ($item) {
                return [
                    'id' => $item->product->id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'name' => $item->product->name,
                ];
            })->toArray(),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $this->dispatch('snapToken', snapToken: $snapToken, items: $this->cartItems);
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}