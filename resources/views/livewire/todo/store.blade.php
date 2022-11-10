<div class="flex items-start justify-between gap-2 py-2 px-4 bg-gray-100 shadow-lg rounded-lg">
    <div class="w-full">
            <x-input class="!bg-transparent" placeholder="create a todo"
            borderless shadowless wire:model='todo.description'/>
    </div>

        <x-button wire:click='save' teal label="Add"/>
    </div>
