<x-slot name="header">
    @lang('Management Posts')
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-jet-form-section submit='submit'>

            <x-slot name="title">
                {{ __('Posts') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam reiciendis obcaecati ratione ad, maxime provident velit eveniet repellat, quam suscipit placeat voluptate. Obcaecati necessitatibus suscipit deserunt, impedit cupiditate ut facilis.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Title') }}" />
                    <x-jet-input type="text" wire:model='title' placeholder="Title" class="mt-1 block w-full" />
                    <x-jet-input-error for="title" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Date') }}" />
                    <x-jet-input type="date" wire:model='date' placeholder="Date" class="mt-1 block w-full" />
                    <x-jet-input-error for="date" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Description') }}" />
                    <textarea wire:model='description' class="block w-full"></textarea>
                    <x-jet-input-error for="description" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <div wire:ignore>
                        <div id="editor">
                            {!! $description !!}
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Text') }}" />
                    <textarea wire:model='text' class="block w-full"></textarea>
                    <x-jet-input-error for="text" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="posted" value="{{ __('Posted') }}" />
                    <select class="block w-full" wire:model='posted'>
                        <option value="">Seleccine</option>
                        <option value="yes">Yes</option>
                        <option value="not">Not</option>
                    </select>
                    <x-jet-input-error for="posted" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="type" value="{{ __('Type') }}" />
                    <select class="block w-full" wire:model='type'>
                        <option value="">Seleccine</option>
                        <option value="adverd">Adverd</option>
                        <option value="post">Post</option>
                        <option value="course">Course</option>
                        <option value="movie">Movie</option>
                    </select>
                    <x-jet-input-error for="type" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="category_id" value="{{ __('Category') }}" />
                    <select class="block w-full" wire:model='category_id'>
                        <option value="">Seleccine</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="category_id" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Image') }}" />
                    <x-jet-input type="file" wire:model='image' class="mt-1 block w-full" />
                    <x-jet-input-error for="image" />
                    @if ($post && $post->image)
                        <img class="w-40 my-3" src="{{ $post->getImageURL() }}" alt="">
                    @endif
                </div>

                <x-slot name="actions">
                    <x-jet-action-message on="created">{{ __('Saved.') }}</x-jet-action-message>
                    <x-jet-button type="submit">{{ __('Saved.') }}</x-jet-button>
                </x-slot>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

<script>
    document.addEventListener('livewire:load', function() {
        let ckEditor = null;
        let editor = ClassicEditor.create(document.querySelector('#editor')).then(
            editor => {
                ckEditor = editor;
                editor.model.document.on('change:data', () => {
                    @this.description = editor.getData();
                });
            }
        );
        /* Comuncación propiedad -> plugin */
        /* Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name === 'description') {
                ckEditor.setData(@this.description);
            }
        }); */
    });
</script>
