<div class="mx-auto max-w-xl space-y-6">
    <h1 class="text-2xl font-semibold">Create board</h1>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="title" class="block text-sm font-medium text-white">
                Board title
            </label>

            <input
                type="text"
                name="title"
                wire:model.defer="title"
                class="mt-3 p-2.5 block w-full rounded-md border-white focus:border-gray-900 focus:ring-gray-900"
                placeholder="My awesome board"
            />

            @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            <button
                type="submit"
                wire:loading.attr="disabled"
                wire:target="save"
                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
            >
                Create
            </button>

            <a
                href="{{ route('boards.index') }}"
                class="text-sm text-gray-600 hover:underline"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
