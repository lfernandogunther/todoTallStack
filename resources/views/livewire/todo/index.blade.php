<div class="flex justify-center items-center min-h-screen w-full mx-auto bg-teal-600">
    <div class="w-full p-4 md:max-w-2xl">
        <div class="sticky top-0 flex items-start justify-between gap-2 py-2 px-4 mb-8 bg-gray-100 shadow-lg rounded-lg">
           <div class="w-full">
                <x-input class="!bg-transparent" placeholder="create a todo"
                borderless shadowless wire:model='todo.description'/>
           </div>

            <x-button wire:click='save' teal label="Add"/>
        </div>

        <ul class="space-y-4">
            @foreach ($todoList as $todo)
                <li wire:key="list:{{ $todo->id }}" class="p-4 bg-gray-100 shadow-lg rounded-lg ">
                    <div class="flex justify-between">
                        <div class="w-full ">{{ $todo->description }}</div>

                        <livewire:todo.delete wire:key="delete:{{ $todo->id }}" :todo="$todo" />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
