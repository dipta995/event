<div>
    <x-jet-form-section submit="updateChannelInformation">
        <x-slot name="title">
            {{ __('Channel Update') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Profile Photo -->
            <input type="hidden" wire:model.defer="channelId" >
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone " value="{{ __('Phone') }}" />
                <x-jet-input id="phone " type="text " class="mt-1 block w-full" wire:model.defer="phone " />
                <x-jet-input-error for="phone " class="mt-2" />
            </div>
            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="address " value="{{ __('Address') }}" />
                        <x-jet-input id="address " type="text " class="mt-1 block w-full" wire:model.defer="address " />
                <x-jet-input-error for="address " class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
