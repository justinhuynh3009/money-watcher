<div class="max-w-md mt-4 mx-auto">
    <div class="sticky top-0 gap-2 bg-base-100 p-4 z-50 border-b border-base-300 flex items-center justify-between">
        {{-- <x-button icon="o-user" class="btn-circle btn-outline" /> --}}
        <x-button icon="o-plus" class="btn-circle btn-outline" link="{{ route('entry-form') }}" />
        {{-- <x-button icon="o-user" class="btn-circle btn-outline" /> --}}

        <div>
            <span class="text-green-700">
                {{ Number::currency($totalDeposits, 'VND', 0) }}
            </span>
            <span class="mx-2">|</span>
            <span class="text-red-700">
                {{ Number::currency($totalWithdrawals, 'VND', 0) }}
            </span>
        </div>
    </div>

    <x-card class="mb-12">
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
    </x-card>

    {{-- TODO:  ADD FOOTER ACTIONS --}}
    {{-- <div class="gap-2 fixed bottom-0 p-4 bg-base-100 border-t border-base-300 flex items-center justify-between h-16">
        <x-button icon="o-user" class="btn-circle btn-outline" />
        <x-button icon="o-plus" class="btn-circle btn-outline" link="{{ route('entry-form') }}" />
        <x-button icon="o-user" class="btn-circle btn-outline" />
    </div> --}}
</div>
