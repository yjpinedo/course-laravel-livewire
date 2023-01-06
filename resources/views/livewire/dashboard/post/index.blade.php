<x-slot name="header">
    @lang('Management Posts')
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

    <a class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out mb-3"
        href="{{ route('dashboard.posts.create') }}">Add</a>

    <div class="flex gap-2 mb-2">

        <select class="block w-full" wire:model='posted'>
            <option value="">Posted</option>
            <option value="yes">Yes</option>
            <option value="not">Not</option>
        </select>

        <select class="block w-full" wire:model='type'>
            <option value="">Type</option>
            <option value="adverd">Adverd</option>
            <option value="post">Post</option>
            <option value="course">Course</option>
            <option value="movie">Movie</option>
        </select>

        <select class="block w-full" wire:model='category_id'>
            <option value="">Category</option>
            @foreach ($categories as $key => $category)
                <option value="{{ $key }}">{{ $category }}</option>
            @endforeach
        </select>

    </div>

    <table class="table w-full border">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">Title</th>
                <th class="p-2">Date</th>
                <th class="p-2">Description</th>
                <th class="p-2">Posted</th>
                <th class="p-2">Type</th>
                <th class="p-2">Category</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="border-b">
                    <td class="p-2">
                        {{ $post->title }}
                    </td>
                    <td class="p-2">
                        {{ $post->date }}
                    </td>
                    <td class="p-2">
                        <textarea>{{ $post->description }}</textarea>
                    </td>
                    <td class="p-2">
                        {{ $post->posted }}
                    </td>
                    <td class="p-2">
                        {{ $post->type }}
                    </td>
                    <td class="p-2">
                        {{ $post->category->title }}
                    </td>
                    <td class="p-2">
                        <a href="{{ route('dashboard.posts.edit', $post) }}"
                            class="mr-2 inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>
                        <x-jet-danger-button wire:click="selectPost({{ $post }})">
                            Delete
                        </x-jet-danger-button>
                    </td>
                </tr>
            @empty
                <tr class="border-b">
                    <td class="p-2">Posts empty</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
    {!! $posts->links() !!}

    <x-jet-confirmation-modal wire:model="confirmingDeletedPost">
        <x-slot name="title">
            {{ __('Delete Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this post?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeletedPost')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</x-card>
