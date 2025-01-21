<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class ButtonCart extends Component
{
    public $cartCount;

    public function mount()
    {
        if (Auth::check()) {
            $this->cartCount = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        } else {
            $this->cartCount = 0;
        }
    }

    #[On('cartUpdated')]
    public function updateCartCount()
    {
        if (Auth::check()) {
            $this->cartCount = Cart::where('user_id', Auth::user()->id)->sum('quantity');
        }
    }


    public function render()
    {
        return view('livewire.button-cart');
    }
}
