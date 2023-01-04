<div>
    <form wire:submit.prevent='submit'>

        <x-jet-label>{{ __('Text') }}</x-jet-label>
        <x-jet-input-error for="text" />
        <textarea wire:model="text"></textarea>

        <x-jet-button type="submit">{{ __('Enviar') }}</x-jet-button>
    </form>
</div>
