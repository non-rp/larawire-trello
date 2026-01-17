
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Boards</h1>

        <a
            href="{{ route('boards.create') }}"
            class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white"
        >
            New board
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($boards as $board)
            <a
                href="{{ route('boards.show', $board) }}"
                class="flex justify-between rounded-xl border border-gray-300 bg-white p-3 hover:shadow"
            >
                <h2 class="text-lg text-black font-medium">{{ $board->title }}</h2>
                <button
                    type="button"
                    wire:click.prevent="confirmDelete({{ $board->id }})"
                    class="cursor-pointer text-base font-semibold group-hover:opacity-100 text-red-500 hover:text-red-300 transition"
                >
                    Delete
                </button>
            </a>
        @endforeach
    </div>

    @if ($deleteBoardId)
        <div class="fixed inset-0 z-30 flex items-center justify-center bg-black/60">
            <div class="w-full max-w-sm rounded-xl bg-zinc-400 p-6">
                <h2 class="text-lg font-semibold text-black">
                    Delete board?
                </h2>

                <p class="mt-2 text-sm text-gray-800">
                    This action cannot be undone.
                </p>

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        type="button"
                        wire:click="$set('deleteBoardId', null)"
                        class="cursor-pointer rounded-md bg-gray-100 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700"
                    >
                        Cancel
                    </button>

                    <button
                        type="button"
                        wire:click="delete"
                        class="cursor-pointer rounded-md bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-500"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
