<div>
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-xl font-bold text-black sm:text-2xl md:text-3xl">Shopping Cart</h2>
        <button class="rounded-md bg-red-500 px-4 py-2 text-sm text-white hover:bg-red-600 sm:text-base" wire:click="clearCart"><x-feathericon-trash-2 class="h-4 w-4" /></button>
    </div>
    @if ($cartItems->isEmpty())
        <p class="text-sm text-black sm:text-base md:text-lg">Cart is Empty</p>
    @else
        @foreach ($cartItems as $item)
            <div class="mb-2 flex flex-col border-b p-2 sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-2 flex items-center gap-2 sm:mb-0">
                    <img class="h-10 w-10 rounded sm:h-12 sm:w-12 md:h-16 md:w-16" src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                    <div>
                        <h3 class="text-sm text-gray-800 sm:text-base md:text-lg">{{ $item->product->name }}</h3>
                        <p class="text-xs text-gray-600 sm:text-sm md:text-base">Rp. {{ number_format($item->product->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
                    <div class="flex items-center justify-center">
                        <button class="h-6 w-6 rounded-md bg-orange-500 text-white hover:bg-orange-600 sm:h-8 sm:w-8" wire:click="decrement({{ $item->product->id }})">-</button>
                        <span class="w-6 text-center text-gray-800 sm:w-8">{{ $item->quantity }}</span>
                        <button class="h-6 w-6 rounded-md bg-orange-500 text-white hover:bg-orange-600 sm:h-8 sm:w-8" wire:click="increment({{ $item->product->id }})">+</button>
                    </div>

                    <p class="text-center text-sm text-gray-800 sm:min-w-[100px] sm:text-right sm:text-base md:text-lg">Rp.
                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        @endforeach
        <p class="text-center text-sm text-gray-800 sm:min-w-[100px] sm:text-right sm:text-base md:text-lg">Rp.
            {{ number_format($totalPrice, 0, ',', '.') }}
        </p>
        <button class="rounded-md bg-orange-500 px-4 py-2 text-white" id="pay-button" wire:click="checkout">Checkout</button>
    @endif
</div>
<!--Midtrans-->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@script
    <script type="text/javascript">
        Livewire.on('snapToken', ({
            snapToken,
            items
        }) => {
            const products = items.map(item => ({
                id: item.product.id,
                price: item.product.price,
                name: item.product.name,
                quantity: item.quantity,
            }));

            snap.pay(snapToken, {
                onSuccess: function(result) {
                    const formData = new FormData();
                    formData.append('order_id', result.order_id);
                    formData.append('products', JSON.stringify(products));
                    formData.append('total', result.gross_amount);
                    formData.append('status', result.transaction_status);
                    formData.append('snap_token', snapToken);
                    fetch('{{ route('midtrans.success') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });
                },
                onPending: function(result) {
                    const formData = new FormData();
                    formData.append('order_id', result.order_id);
                    formData.append('products', JSON.stringify(products));
                    formData.append('total', result.gross_amount);
                    formData.append('status', result.transaction_status);
                    formData.append('snap_token', snapToken);
                    fetch('{{ route('midtrans.pending') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });
                },
            });
        })
    </script>
@endscript
