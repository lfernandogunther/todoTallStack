<div>
    <x-checkbox
        :checked="$todo->done"
        id="toggle.{{ $todo->id }}"
        lg
        wire:model="todo.done"
    />
</div>
