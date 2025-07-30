<div>
    <x-form wire:submit="save">
        <x-input label="Amount" wire:model="amount" prefix="VND" money hint="It submits an unmasked value" />

        {{-- <x-choices-offline label="Category" wire:model="selectedCategory" :options="$categories"
            placeholder="Search ..." single clearable searchable /> --}}

        <x-select-group label="Category" :options="$categories" wire:model="selectedCategory" />

        <x-datetime label="Datetime" wire:model="date" type="datetime-local" />

        <x-input label="Description" wire:model="description" placeholder="A short description" clearable />

        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Save" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
