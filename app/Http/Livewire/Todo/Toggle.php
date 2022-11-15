<?php

namespace App\Http\Livewire\Todo;

use App\Events\TodoRefresh;
use App\Models\Todo;
use Livewire\Component;
use WireUi\Traits\Actions;

class Toggle extends Component
{
    use Actions;

    public Todo $todo;

    protected array $rules = [
        'todo.done' => 'boolean|required'
    ];

    public function updatedTodoDone(): void
    {
        $this->validate();

        $this->todo->save();

        $this->emit('todo:list-updated');
        TodoRefresh::dispatch();
    }

    public function render()
    {
        return view('livewire.todo.toggle');
    }
}
