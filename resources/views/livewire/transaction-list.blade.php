<div class="max-w-md mx-auto">
    @foreach ($transactions as $groupedDate => $txs)
        <x-badge value="{{ $groupedDate }}" class="badge-soft mt-3" />

        @foreach ($txs as $tx)
            <x-list-item :item="$tx" link="{{ route('entry-form', data_get($tx, 'uuid')) }}">
                <x-slot:avatar>
                    <x-gmdi-coffee-r class="inline w-5 h-5" />
                </x-slot:avatar>
                <x-slot:value>
                    {{ data_get($tx, 'category.name', 'N/A') }}
                </x-slot:value>
                <x-slot:sub-value>
                    {{ data_get($tx, 'description', 'test') }}
                </x-slot:sub-value>
                <x-slot:actions>
                    <div class="text-red-700">{{ data_get($tx, 'display_amount', 0) }}</div>
                </x-slot:actions>
            </x-list-item>
        @endforeach
    @endforeach
</div>
