<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use WireUi\Traits\Actions;

class Toggle extends Component
{
    use Actions;

    public Todo $todo;

    protected $rules = [
        'todo.done' => 'boolean|required'
    ];

    public function updatedTodoDone(): void
    {
        $this->validate();

        $this->todo->save();

        $this->notification()->success(
            title: 'Todo',
            description: 'Your todo was successfully updated.'
        );

        $this->emitUp('todo:toggle');
    }

    public function render()
    {
        return view('livewire.todo.toggle');
    }
}
