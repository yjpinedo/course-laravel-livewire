<div>

    <x-jet-action-message on="deleted">
        {{ __('Delete...') }}
    </x-jet-action-message>

    <h1>Listado</h1>
    <table class="table w-full">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th>
                        {{ $category->title }}
                    </th>
                    <td>
                        <a href="{{ route('dashboard.category.edit', $category) }}">Edit</a>
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
</div>
