<?php

use App\Http\Livewire\Todo\Store;
use App\Models\Todo;

use function Pest\Livewire\livewire;

it('can add todo', function(){
    $description = 'test create todo';

    $this->assertDatabaseMissing('todos',['description' => $description]);

    livewire(Store::class)
        ->set('todo.description', $description)
        ->call('save')
        ->assertEmitted('todo:list-updated')
        ->assertOk();

    $this->assertDatabaseHas('todos',['description' => $description]);
});

it('can cancel edit mode', function(){
    $todo = Todo::factory()->create();

    $newDescription = "new description";

    livewire(Store::class)
        ->call('save')
        ->assertHasErrors()
        ->call('edit', $todo)
        ->assertSee('todo.description', $todo->description)
        ->assertHasNoErrors()
        ->set('todo.description', $newDescription)
        ->call('save')
        ->assertOk();

    $this->assertDatabaseHas('todos', ['description' => $newDescription]);

    $this->assertDatabaseMissing('todos', ['description' => $todo->description]);
});

it('can see error of required field', function(){
    $description = 'test dont create todo';

    $this->assertDatabaseMissing('todos',['description' => $description]);

    livewire(Store::class)
        ->call('save')
        ->assertHasErrors()
        ->assertOk();

    $this->assertDatabaseMissing('todos',['description' => $description]);
});
