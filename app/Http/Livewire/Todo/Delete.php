<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use WireUi\Traits\Actions;

class Delete extends Component
{
    use Actions;

    public Todo $todo;

    public function delete(): void
    {
        $this->todo->delete();

        $this->notification()->success(
            title: 'Todo',
            description: 'Your todo was successfully deleted.'
        );

        $this->emit('todo:list-updated');
    }

    public function render()
    {
        return view('livewire.todo.delete');
    }
}
