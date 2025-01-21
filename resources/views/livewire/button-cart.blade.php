<div>
    <x-feathericon-shopping-cart class="text-white hover:text-orange-500" />
    @if ($cartCount > 0)
        <span class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500 text-xs text-white">{{ $cartCount }}</span>
    @endif
</div>
