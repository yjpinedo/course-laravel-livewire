<div>
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
                        <a href="{{ route('dashboard.category.edit', $category->id) }}">Edit</a>
                        <button type="button">Delete</button>
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
