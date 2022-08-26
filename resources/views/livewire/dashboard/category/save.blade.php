<div>
    <form wire:submit.prevent='submit'>
        <x-jet-input type="text" wire:model='title' placeholder="Title"/>
        <x-jet-input-error for="title"/>
        <x-jet-input type="text" wire:model='text' placeholder="Text"/>
        <x-jet-input-error for="text"/>
        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
