<div>

    <x-jet-action-message on="created">
        {{ __('Saved.') }}
    </x-jet-action-message>

    <form wire:submit.prevent='submit'>
        <x-jet-input type="text" wire:model='title' placeholder="Title" />
        <x-jet-input-error for="title" />

        <x-jet-input type="text" wire:model='text' placeholder="Text" />
        <x-jet-input-error for="text" />

        <x-jet-input type="file" wire:model='image' />
        <x-jet-input-error for="image" />

        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
