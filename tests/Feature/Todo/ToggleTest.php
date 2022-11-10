<?php

use App\Http\Livewire\Todo\Toggle;
use App\Models\Todo;

use function Pest\Livewire\livewire;

it('can toggle todo', function () {
    $todo = Todo::factory()->create();

    $this->assertDatabaseHas('todos', [
        'id'    => $todo->id,
        'description' => $todo->description,
        'done' => false
    ]);

    livewire(Toggle::class, ['todo' => $todo])
        ->set('todo.done', true)
        ->assertEmittedUp('todo:toggle');

    $this->assertDatabaseHas('todos', [
        'id'    => $todo->id,
        'description' => $todo->description,
        'done' => true
    ]);
});
