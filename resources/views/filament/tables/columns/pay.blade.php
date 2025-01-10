<div>
    <button class="flex items-center gap-2 rounded-md bg-blue-500 px-2 py-1 text-sm text-white hover:bg-blue-600" id="pay-button-{{ $getRecord()->id }}">
        <x-heroicon-o-credit-card class="h-4 w-4" />
        Bayar
    </button>
</div>

<script type="text/javascript">
    document.getElementById('pay-button-{{ $getRecord()->id }}').addEventListener('click', function() {
        snap.pay('{{ $getRecord()->snap_token }}', {
            onSuccess: function(result) {
                const formData = new FormData();
                formData.append('status', result.transaction_status);
                formData.append('order_id', result.order_id);
                fetch('{{ route('midtrans.success') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });
            },
        });
    });
</script>
