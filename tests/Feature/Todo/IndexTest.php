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

it('can active see edit button when not done', function(){
    $todoItems = Todo::factory()
        ->sequence(
            ['description' => "my description 1"],
            ['description' => "my description 2", 'done' => true],
        )
        ->count(2)
        ->create();

    livewire(Index::class)
        ->assertSeeHtml("todo.edit:{$todoItems->first()->id}")
        ->assertDontSeeHtml("todo.edit:{$todoItems->last()->id}");
});

it('can active edit mode', function(){
    $todo = Todo::factory()
        ->create(['description' => "my description 1"]);

    livewire(Index::class)
        ->call('edit', $todo->id)
        ->assertEmitted('todo:edit', $todo->id);
});
