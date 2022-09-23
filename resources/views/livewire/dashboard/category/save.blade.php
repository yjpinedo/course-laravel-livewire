<x-slot name="header">
    @lang('Management Categories')
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-jet-form-section submit='submit'>

            <x-slot name="title">
                {{ __('Categories') }}
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
                    <x-jet-label for="name" value="{{ __('Text') }}" />
                    <x-jet-input type="text" wire:model='text' placeholder="Text" class="mt-1 block w-full" />
                    <x-jet-input-error for="text" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Image') }}" />
                    <x-jet-input type="file" wire:model='image' class="mt-1 block w-full" />
                    <x-jet-input-error for="image" />
                    @if ($category && $category->image)
                        <img class="w-40 my-3" src="{{ $category->getImageURL() }}" alt="">
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
