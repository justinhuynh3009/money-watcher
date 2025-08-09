<div class="max-w-md mt-4 mx-auto">
    @foreach ($actions as $action)
        <x-list-item :item="$action" wire:click="{{ data_get($action, 'action', '') }}">
            <x-slot:avatar>
                @svg(data_get($action, 'icon', 'o-coffee'), ['class' => 'inline w-5 h-5'])
            </x-slot:avatar>
            <x-slot:value>
                {{ data_get($action, 'name', 'N/A') }}
            </x-slot:value>
        </x-list-item>
    @endforeach
</div>
