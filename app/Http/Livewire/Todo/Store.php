<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use WireUi\Traits\Actions;

class Store extends Component
{
    use Actions;

    public Todo $todo;

    protected $listeners = [
        'todo:edit' => 'edit',
    ];

    protected $rules = [
        'todo.description' => 'required|max:50'
    ];

    public function mount()
    {
        $this->resetTodo();
    }

    public function resetTodo(): void
    {
        $this->todo = new Todo();
        $this->resetErrorBag();
    }

    public function getEditModeProperty(): bool
    {
        return (bool)$this->todo->id;
    }

    public function save(): void
    {
        $this->validate();

        $this->todo->save();

        $this->emit('todo:list-updated');

        $this->resetTodo();
    }

    public function edit(Todo $todo)
    {
        $this->todo = $todo;

        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.todo.store');
    }
}
