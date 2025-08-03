<div class="max-w-md mx-auto">
    @foreach ($transactions as $transaction)
        <x-list-item :item="$transaction" link="{{ route('entry-form', data_get($transaction, 'uuid')) }}">
            <x-slot:avatar>
                <x-gmdi-coffee-r class="inline w-5 h-5" />
            </x-slot:avatar>
            <x-slot:value>
                {{ data_get($transaction, 'category.name', 'N/A') }}
            </x-slot:value>
            <x-slot:sub-value>
                {{ data_get($transaction, 'description', 'test') }}
            </x-slot:sub-value>
            <x-slot:actions>
                <div class="text-red-700">{{ data_get($transaction, 'display_amount', 0) }}</div>
            </x-slot:actions>
        </x-list-item>
    @endforeach
</div>
