<div>
    <form wire:submit.prevent='submit'>
        <x-jet-label>{{ __('Name') }}</x-jet-label>
        <x-jet-input-error for="name" />
        <x-jet-input type="text" wire:model="name" />

        <x-jet-label>{{ __('Surname') }}</x-jet-label>
        <x-jet-input-error for="surname" />
        <x-jet-input type="text" wire:model="surname" />

        <x-jet-label>{{ __('Other') }}</x-jet-label>
        <x-jet-input-error for="other" />
        <textarea wire:model="other"></textarea>

        <x-jet-label>{{ __('Choises') }}</x-jet-label>
        <x-jet-input-error for="choices" />
        <select wire:model="choices">
            <option value="">{{ __('Selected') }}</option>
            <option value="adverd">{{ __('Adverd') }}</option>
            <option value="post">{{ __('Post') }}</option>
            <option value="course">{{ __('Course') }}</option>
            <option value="movie">{{ __('Movie') }}</option>
            <option value="other">{{ __('Other') }}</option>
        </select>

        <x-jet-secondary-button wire:click="$emit('stepEvent', 1)">{{ __('Atras') }}</x-jet-secondary-button>
        <x-jet-button type="submit">{{ __('Enviar') }}</x-jet-button>
    </form>
</div>
