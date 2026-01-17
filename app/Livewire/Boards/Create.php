<?php

namespace App\Livewire\Boards;

use App\Models\Board;
use Livewire\Component;

class Create extends Component
{
    public string $title = '';

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
        ];
    }

    public function save()
    {
        $this->validate();

        $board = Board::create([
            'title' => $this->title,
        ]);

        return redirect()->route('boards.show', $board);
    }

    public function render()
    {
        return view('livewire.boards.create');
    }
}
