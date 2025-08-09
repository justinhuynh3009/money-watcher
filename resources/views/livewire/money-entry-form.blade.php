<div class="max-w-md mx-auto">
    <x-form wire:submit="save">
        <x-select-group label="Category" :options="$categories" wire:model="selectedCategory" />

        <x-input label="Amount" wire:model="amount" prefix="VND" money />

        <x-datetime label="Datetime" wire:model="date" type="datetime-local" />

        <x-input label="Description" wire:model="description" placeholder="A short description" clearable />

        <x-slot:actions class="w-full">
            <x-button label="Cancel" class="w-1/2" wire:navigate href="{{ route('transactions') }}" />
            <x-button label="Save" class="btn-primary w-1/2" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
