<?php

namespace App\Livewire\Dashboard;

use App\Models\Board;
use App\Models\Card;
use App\Models\Group;
use Livewire\Component;

class Stats extends Component
{
    public int $boardsCount = 0;
    public int $groupsCount = 0;
    public int $cardsCount = 0;

    public function mount(): void
    {
        $this->boardsCount = Board::count();
        $this->groupsCount = Group::count();
        $this->cardsCount = Card::count();
    }

    public function render()
    {
        return view('livewire.dashboard.stats');
    }
}
