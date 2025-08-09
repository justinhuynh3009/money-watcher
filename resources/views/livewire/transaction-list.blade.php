<div class="max-w-md mt-4 mx-auto">
    <div class="sticky top-0 gap-2 bg-base-100 p-4 z-50 border-b border-base-300 flex items-center justify-between">
        {{-- <x-button icon="o-user" class="btn-circle btn-outline" /> --}}
        {{-- <x-button icon="o-plus" class="btn-circle btn-outline" link="{{ route('entry-form') }}" /> --}}
        {{-- <x-button icon="o-user" class="btn-circle btn-outline" /> --}}
        <x-select wire:model="selectedRange" :options="$timeRanges" icon="o-calendar-date-range" />

        <div>
            <span class="text-green-700">
                {{ $totalDeposits }}
            </span>
            <span class="mx-2">|</span>
            <span class="text-red-700">
                {{ $totalWithdrawals }}
            </span>
        </div>
    </div>

    <x-card class="mb-20">
        @foreach ($transactions as $groupedDate => $txs)
            <x-badge value="{{ $groupedDate }}" class="badge-soft mt-3" />

            @foreach ($txs as $tx)
                <x-list-item :item="$tx" link="{{ route('entry-form', data_get($tx, 'uuid')) }}">
                    <x-slot:avatar>
                        @svg(data_get($tx, 'category.icon', 'o-coffee'), ['class' => 'inline w-5 h-5'])
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
</div>
