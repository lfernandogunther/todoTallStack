<div @class(['line-through' => $todo->done])>
    <x-checkbox  label="{{$todo->description}}" id="toggle.{{$todo->id}}" lg wire:model="todo.done" />
</div>
