<?php

use App\Http\Livewire\Todo\Actions;
use App\Models\Todo;

use function Pest\Livewire\livewire;

it('it can delete all to do items', function () {
    $todoItems = Todo::factory(3)->create();

    $todoItems->map(function($todo){
        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'description' => $todo->description,
            'deleted_at' => null
        ]);
    });

    livewire(Actions::class)
        ->call('resetList');

    $todoItems->map(function($todo){
        $this->assertSoftDeleted('todos', [
            'id' => $todo->id,
            'description' => $todo->description
        ]);
    });
});
