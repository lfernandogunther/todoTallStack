<div class="flex items-start justify-between gap-2 py-2 px-4 bg-gray-100 shadow-lg rounded-lg">
    <div class="w-full">
            <x-input class="!bg-transparent" placeholder="Create a todo item"
            borderless shadowless wire:model='todo.description'/>
    </div>

    <div class="flex justify-between items-center gap-2">
        @if($this->editMode)
            <x-button wire:click='resetTodo' rounded flat red icon="x"/>
        @endif

        <x-button wire:click='save' teal label="{{ $this->editMode ? 'Update' : 'Add' }}"/>
    </div>
</div>
