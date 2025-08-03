<div>
    <x-form wire:submit="login" class="max-w-md mx-auto">
        <x-input label="Email" wire:model="email" />
        <x-password label="Password" wire:model="password" right />

        <div class="text-center mt-4">
            <a wire:navigate href="{{ route('register') }}" class="text-sm text-primary hover:underline">Don't have an account? Register</a>
        </div>

        <x-slot:actions class="mx-auto w-full">
            <x-button label="Login" class="btn-primary w-full" type="submit" spinner="login" />
        </x-slot:actions>
    </x-form>
</div>
