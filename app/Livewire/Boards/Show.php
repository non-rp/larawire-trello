<?php

namespace App\Livewire\Boards;

use App\Models\Board;
use App\Models\Card;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    public Board $board;

    public $groups = [];

    public function mount(Board $board): void
    {
        $this->board = $board;
        $this->loadGroups();
    }

    public function loadGroups(): void
    {
        $this->groups = $this->board->groups()
            ->with(['cards' => fn ($q) => $q->orderBy('sort')])
            ->orderBy('sort')
            ->get();
    }

    public function createGroup(string $title): void
    {
        $maxSort = (int) $this->board->groups()->max('sort');

        Group::create([
            'board_id' => $this->board->id,
            'title' => $title,
            'sort' => $maxSort + 10,
        ]);

        $this->loadGroups();
    }

    /**
     * Idempotent: server applies the final order exactly as provided.
     */
    public function moveCard(int $cardId, int $toGroupId, array $orderedCardIds): void
    {
        $toGroup = Group::query()
            ->where('id', $toGroupId)
            ->where('board_id', $this->board->id)
            ->firstOrFail();

        DB::transaction(function () use ($cardId, $toGroup, $orderedCardIds) {
            $card = Card::query()
                ->where('id', $cardId)
                ->where('board_id', $this->board->id)
                ->firstOrFail();

            // Ensure card belongs to this board and target group belongs to this board
            $card->update([
                'group_id' => $toGroup->id,
                'board_id' => $toGroup->board_id,
            ]);

            // Re-assign sort in the target group according to final order
            foreach (array_values($orderedCardIds) as $index => $id) {
                Card::query()
                    ->where('id', (int) $id)
                    ->where('board_id', $this->board->id)
                    ->update([
                        'group_id' => $toGroup->id,
                        'sort' => ($index + 1) * 10,
                    ]);
            }
        });

        $this->loadGroups();
    }

    public function render()
    {
        return view('livewire.boards.show');
    }
}
