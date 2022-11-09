<?php

use App\Http\Livewire\Todo\Index;
use App\Models\Todo;

use function Pest\Livewire\livewire;

it('can be listed', function () {
    Todo::factory()
        ->sequence(
            ['description' => "my description 1"],
            ['description' => "my description 2"],
            ['description' => "my description 3"],
        )
        ->count(3)
        ->create();

    livewire(Index::class)
        ->assertCount('todoList', 3)
        ->assertSeeText('my description 1')
        ->assertSeeText('my description 2')
        ->assertSeeText('my description 3')
        ->assertOk();
});

it('can add todo', function(){
    livewire(Index::class)
        ->set('todo.description', 'test todo list')
        ->assertCount('todoList', 0)
        ->call('save')
        ->assertSeeText('test todo list')
        ->assertCount('todoList', 1)
        ->assertOk();
});

it('can see error of required field', function(){
    livewire(Index::class)
        ->assertCount('todoList', 0)
        ->call('save')
        ->assertHasErrors()
        ->assertCount('todoList', 0)
        ->assertOk();
});
