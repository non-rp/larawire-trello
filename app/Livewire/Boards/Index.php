<?php

namespace App\Livewire\Boards;

use App\Models\Board;
use Livewire\Component;

class Index extends Component
{
    public $boards;
    public ?int $deleteBoardId = null;

    public function mount(): void
    {
        $this->boards = Board::query()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function confirmDelete(int $boardId): void
    {
        $this->deleteBoardId = $boardId;
    }

    public function delete(): void
    {
        $board = Board::findOrFail($this->deleteBoardId);

        $board->delete();

        $this->deleteBoardId = null;

        $this->boards = Board::query()
            ->withCount('groups')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.boards.index');
    }
}
