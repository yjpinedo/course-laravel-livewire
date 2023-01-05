<div>
    <form wire:submit.prevent='submit'>

        <x-jet-label>{{ __('Text') }}</x-jet-label>
        <x-jet-input-error for="text" />
        <textarea wire:model="text"></textarea>

        <x-jet-secondary-button wire:click="$emit('stepEvent', 2)">{{ __('Atras') }}</x-jet-secondary-button>
        <x-jet-button type="submit">{{ __('Enviar') }}</x-jet-button>
    </form>
</div>
