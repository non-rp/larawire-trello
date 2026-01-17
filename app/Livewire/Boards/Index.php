<?php

namespace App\Livewire\Boards;

use App\Models\Board;
use Livewire\Component;

class Index extends Component
{
    public $boards;

    public function mount(): void
    {
        $this->boards = Board::query()
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function render()
    {
        return view('livewire.boards.index');
    }
}
