
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Boards</h1>

        <a
            href=""
            class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white"
        >
            New board
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($boards as $board)
            <a
                href="{{ route('boards.show', $board) }}"
                class="block rounded-xl border border-gray-200 bg-white p-4 hover:shadow"
            >
                <h2 class="text-lg font-medium">{{ $board->title }}</h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ $board->groups()->count() }} columns
                </p>
            </a>
        @endforeach
    </div>
</div>
