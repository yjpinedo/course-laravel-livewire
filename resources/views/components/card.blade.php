<div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 container">
    <div class="w-full sm:max-w-4xl bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div>
            <h4 class="text-3xl text-center py-3 text-gray-600 bg-gray-50">{{ $title }}</h2>
        </div>
        <div class="px-6 py-4">
            {{ $slot }}
        </div>
    </div>
</div>
