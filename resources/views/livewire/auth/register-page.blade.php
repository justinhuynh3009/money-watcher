<div>
    <x-form wire:submit="register" class="max-w-md mx-auto">
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-password label="Password" wire:model="password" right />
        <x-password label="Confirm Password" wire:model="password_confirmation" right />

        <div class="text-center mt-4">
            <a wire:navigate href="{{ route('login') }}" class="text-sm text-primary hover:underline">Already have an
                account? Login</a>
        </div>

        <x-slot:actions class="mx-auto w-full">
            <x-button label="Register" class="btn-primary w-full" type="submit" spinner="register" />
        </x-slot:actions>
    </x-form>
</div>
