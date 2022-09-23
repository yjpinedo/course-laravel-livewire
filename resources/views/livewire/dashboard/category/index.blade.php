<x-slot name="header">
    @lang('Management Categories')
</x-slot>

<x-card>

    <x-jet-action-message on="deleted">
        {{ __('Delete...') }}
    </x-jet-action-message>

    <x-slot name="title">
        Listado
    </x-slot>

    <table class="table w-full border">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">Title</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="border-b">
                    <td class="p-2">
                        {{ $category->title }}
                    </td>
                    <td class="p-2">
                        <a href="{{ route('dashboard.category.edit', $category) }}" class="mr-2">Edit</a>
                        <x-jet-danger-button
                            {{-- onclick="confirm('Seguro que desea eliminar la categoría seleccionada?') || event.stopImmediatePropagation()" --}}
                            wire:click="seletCategory({{ $category }})">
                            Delete
                        </x-jet-danger-button>
                    </td>
                </tr>
            @empty
                <h1>Categories empty</h1>
            @endforelse
        </tbody>
    </table>
    <br>
    {!! $categories->links() !!}

    <x-jet-confirmation-modal wire:model="confirmingDeletedCategory">
        <x-slot name="title">
            {{ __('Delete Category') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this category?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeletedCategory')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</x-card>
