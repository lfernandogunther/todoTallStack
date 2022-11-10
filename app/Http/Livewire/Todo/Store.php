<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use WireUi\Traits\Actions;

class Store extends Component
{
    use Actions;

    public Todo $todo;

    protected $rules = [
        'todo.description' => 'required|max:50'
    ];

    public function mount()
    {
        $this->resetTodo();
    }

    private function resetTodo(): void
    {
        $this->todo = new Todo();
    }

    public function save(): void
    {
        $this->validate();

        $this->todo->save();

        $this->notification()->success(
            title: 'Todo',
            description: 'Your todo was successfully stored.'
        );

        $this->emitUp('todo:stored');

        $this->resetTodo();
    }

    public function render()
    {
        return view('livewire.todo.store');
    }
}
