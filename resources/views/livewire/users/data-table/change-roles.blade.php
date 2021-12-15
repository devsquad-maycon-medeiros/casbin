<div class="ml-2">
    <x-icon class="w-4 h-4 cursor-pointer" wire:click="$set('editing', true)" name="pencil" />
    <x-jet-dialog-modal wire:model="editing" maxWidth="md">
        <x-slot name="title">
            {{ __('Change User Roles') }}
        </x-slot>

        <x-slot name="content">
            @foreach ($this->roleOptions as $role)
                <label class="flex items-center">
                    <x-jet-checkbox wire:model.defer="roleNames" :value="$role" />
                    <span class="ml-2 text-sm text-gray-600">{{ $role }}</span>
                </label>
            @endforeach
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('editing', false)">
                Cancel
            </x-jet-secondary-button>
            <x-jet-button wire:click="save">Save</x-jet-button>
        </x-slot>


    </x-jet-dialog-modal>
</div>
