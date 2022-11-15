<?php

namespace App\Http\Livewire\Todo;

use App\Events\TodoRefresh;
use App\Models\Todo;
use WireUi\Traits;

use Livewire\Component;

class Actions extends Component
{
    use Traits\Actions;

    protected $listeners = [
        'todo:list-updated' => '$refresh'
    ];

    public function confirmReset(): void
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'Reset the to do list?',
            'acceptable' => 'Yes, to it!',
            'method' => 'resetList'
        ]);
    }

    public function resetList(): void
    {
        Todo::all()->map->delete();

        $this->notification()->success(
            title: 'Todo',
            description: 'Your todo list was deleted successfully.'
        );

        $this->emit('todo:list-updated');
        TodoRefresh::dispatch();
    }

    public function getIsTodoListEmptyProperty(): bool
    {
        return Todo::count() === 0;
    }

    public function render()
    {
        return view('livewire.todo.actions');
    }
}
