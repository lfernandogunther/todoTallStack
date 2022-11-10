<?php

use App\Http\Livewire\Todo\Store;

use function Pest\Livewire\livewire;

it('can add todo', function(){
    $description = 'test create todo';

    $this->assertDatabaseMissing('todos',['description' => $description]);

    livewire(Store::class)
        ->set('todo.description', $description)
        ->call('save')
        ->assertEmittedUp('todo:stored')
        ->assertOk();

    $this->assertDatabaseHas('todos',['description' => $description]);
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
