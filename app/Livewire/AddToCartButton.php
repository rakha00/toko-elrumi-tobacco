<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCartButton extends Component
{
    public $product;
    public $cartItems;
    public $totalPrice;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate(
            [
                'product_id' => $this->product->id,
                'user_id' => Auth::user()->id
            ],
            ['quantity' => 0]
        );

        $cart->increment('quantity');
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}