<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $todoList;

    public Todo $todo;

    protected $listeners = [
        'todo:deleted' => '$refresh'
    ];

    protected $rules = [
        'todo.description' => 'required|max:50'
    ];

    public function mount(): void
    {
        $this->resetTodo();
    }

    private function fillTodoList(): void
    {
        $this->todoList = Todo::orderBy('id', 'desc')->get();
    }

    public function save(): void
    {
        $this->validate();

        $this->todo->save();

        $this->resetTodo();
    }

    private function resetTodo(): void
    {
        $this->todo = new Todo();
    }

    public function render()
    {
        $this->fillTodoList();

        return view('livewire.todo.index');
    }
}
