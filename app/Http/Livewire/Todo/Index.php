<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $todoList;

    protected $listeners = [
        'todo:deleted' => '$refresh',
        'todo:stored' => '$refresh',
        'todo:toggle' => '$refresh'
    ];

    public function edit(string|int $todoId)
    {
        $this->emit('todo:edit', $todoId);
    }

    private function fillTodoList(): void
    {
        $this->todoList = Todo::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $this->fillTodoList();

        return view('livewire.todo.index');
    }
}
