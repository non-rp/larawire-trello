<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-semibold text-white">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-400">Overview</p>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-gray-800 bg-gray-900 p-6">
            <div class="text-sm text-gray-400">Boards</div>
            <div class="mt-2 text-3xl font-semibold leading-none text-white">
                {{ $boardsCount }}
            </div>
        </div>

        <div class="rounded-xl border border-gray-800 bg-gray-900 p-6">
            <div class="text-sm text-gray-400">Columns</div>
            <div class="mt-2 text-3xl font-semibold leading-none text-white">
                {{ $groupsCount }}
            </div>
        </div>

        <div class="rounded-xl border border-gray-800 bg-gray-900 p-6">
            <div class="text-sm text-gray-400">Cards</div>
            <div class="mt-2 text-3xl font-semibold leading-none text-white">
                {{ $cardsCount }}
            </div>
        </div>
    </div>
</div>

