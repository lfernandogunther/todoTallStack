<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
       'todo:list-updated' => '$refresh',
       'echo:todos,TodoRefresh' => '$refresh',
    ];

    public function edit(string|int $todoId)
    {
        $this->emit('todo:edit', $todoId);
    }

    public function getTodoListProperty(): Collection
    {
        return Todo::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.todo.index');
    }
}
