<?php

use App\Http\Livewire\Todo\Delete;
use App\Models\Todo;

use function Pest\Livewire\livewire;

it('can delete todo', function () {
    $todo = Todo::factory()->create();

    $this->assertDatabaseHas('todos', [
        'id'    => $todo->id,
        'description' => $todo->description
    ]);

    livewire(Delete::class, ['todo' => $todo])
        ->call('delete')
        ->assertEmittedUp('todo:deleted');

    $this->assertSoftDeleted('todos', [
        'id'    => $todo->id,
        'description' => $todo->description
    ]);
});
