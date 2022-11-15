<form
    wire:submit.prevent="save"
    class="flex items-start justify-between gap-2 py-2 px-4 bg-gray-100 shadow-lg rounded-lg"
>
    <div class="w-full">
        <x-input
            class="!bg-transparent"
            placeholder="Create a todo item"
            borderless
            shadowless
            wire:model.defer='todo.description'
        />
    </div>

    <div class="flex justify-between items-center gap-2">
        @if ($this->editMode)
            <x-icon
                name="x"
                class="w-5 h-5 text-red-400 cursor-pointer"
                wire:click='resetTodo'
            />
        @endif

        <x-button
            type="form"
            teal
            label="{{ $this->editMode ? 'Update' : 'Add' }}"
        />
    </div>
</form>
