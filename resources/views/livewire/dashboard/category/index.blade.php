<x-slot name="header">
    @lang('Management Categories')
</x-slot>

<x-card>

    <x-jet-action-message on="deleted">
        <div class="py-2 px-4 bg-green-300 border rounded mb-4 text-black">
            {{ __('Delete...') }}
        </div>
    </x-jet-action-message>

    <x-slot name="title">
        {{ __('List') }}
    </x-slot>

    <a class="inline-block px-6 py-2.5 w-full text-center bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out mb-3" href="{{ route('dashboard.category.create') }}">Add</a>

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
                        <a href="{{ route('dashboard.category.edit', $category) }}" class="mr-2 inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                        <x-jet-danger-button
                            {{-- onclick="confirm('Seguro que desea eliminar la categoría seleccionada?') || event.stopImmediatePropagation()" --}}
                            wire:click="selectCategory({{ $category }})">
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
