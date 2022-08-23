<div>
    <form wire:submit.prevent='submit'>
        <input type="text" wire:model='title' placeholder="Title">
        @error('title')
            {{ $message }}
        @enderror
        <input type="text" wire:model='text' placeholder="Text">
        @error('text')
            {{ $message }}
        @enderror
        <button type="submit">Enviar</button>
    </form>
</div>
