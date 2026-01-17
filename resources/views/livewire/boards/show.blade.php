<div class="flex h-[calc(100vh-6rem)] flex-col gap-6">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div class="min-w-0">
            <h1 class="truncate text-2xl font-semibold text-white">
                {{ $board->title }}
            </h1>
            <p class="mt-1 text-sm text-gray-400">
                Kanban board
            </p>
        </div>

        <div class="flex items-center gap-2">
            <button
                type="button"
                wire:click="openCreateGroup"
                class="rounded-md bg-white px-4 py-2 text-sm font-medium text-black hover:bg-gray-200 transition"
            >
                + Add column
            </button>
        </div>
    </div>

    {{-- Kanban --}}
    <div
        class="flex flex-1 gap-4 overflow-x-auto pb-4"
        style="scrollbar-gutter: stable;"
    >
        @foreach ($groups as $group)
            <div
                class="w-80 shrink-0 rounded-xl border border-gray-800 bg-gray-900"
                wire:key="group-{{ $group->id }}"
                data-group-id="{{ $group->id }}"
            >
                {{-- Column header --}}
                <div class="flex items-center justify-between border-b border-gray-800 px-4 py-3">
                    <div class="min-w-0">
                        <h2 class="truncate text-sm font-semibold text-white">
                            {{ $group->title }}
                        </h2>
                        <p class="text-xs text-gray-500">
                            {{ $group->cards->count() }} cards
                        </p>
                    </div>

                    <button
                        type="button"
                        class="rounded-md px-2 py-1 text-sm text-gray-400 hover:bg-gray-800"
                        wire:click="openCreateCard({{ $group->id }})"
                    >
                        +
                    </button>
                </div>

                {{-- Cards --}}
                <div class="p-3">
                    <div
                        class="min-h-[24px] space-y-2"
                        data-cards-container
                        data-group-id="{{ $group->id }}"
                    >
                        @foreach ($group->cards as $card)
                            <div
                                class="group cursor-grab rounded-lg border border-gray-800 bg-gray-950 p-3 transition hover:border-gray-700 hover:bg-gray-900"
                                wire:key="card-{{ $card->id }}"
                                data-card-id="{{ $card->id }}"
                            >
                                <div class="flex items-start justify-between gap-2">
                                    <p class="break-words text-sm font-medium text-white">
                                        {{ $card->title }}
                                    </p>

                                    <button
                                        type="button"
                                        class="invisible rounded-md px-2 py-1 text-xs text-gray-400 hover:bg-gray-800 group-hover:visible"
                                        wire:click="openCard({{ $card->id }})"
                                    >
                                        Open
                                    </button>
                                </div>

                                <div class="mt-2 flex items-center justify-between text-xs text-gray-500">
                                    <span>#{{ $card->id }}</span>
                                    <span class="rounded bg-gray-800 px-2 py-0.5">
										drag
									</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        wire:click="openCreateCard({{ $group->id }})"
                        class="mt-3 w-full rounded-lg border border-dashed border-gray-800 bg-gray-950 px-3 py-2 text-sm text-gray-400 hover:bg-gray-900 hover:text-gray-300 transition"
                    >
                        + Add card
                    </button>
                </div>
            </div>
        @endforeach

        {{-- Add column --}}
        <div class="w-80 shrink-0">
            <button
                type="button"
                wire:click="openCreateGroup"
                class="flex h-full w-full items-center justify-center rounded-xl border border-dashed border-gray-800 bg-gray-900 text-sm text-gray-400 hover:bg-gray-800 hover:text-gray-300 transition"
            >
                + Add another column
            </button>
        </div>
    </div>
</div>

