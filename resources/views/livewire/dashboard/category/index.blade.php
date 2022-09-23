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
                        <x-jet-danger-button onclick="confirm('Seguro que desea eliminar la categoría seleccionada?') || event.stopImmediatePropagation()" wire:click="delete({{ $category }})">
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
</x-card>
