<div class="flex justify-center items-center h-screen w-screen bg-teal-600">
    <div class="w-full p-4 md:max-w-2xl">
        <div class="flex justify-between gap-2 py-2 px-4 mb-8 bg-gray-100 shadow-lg rounded-lg">
           <div class="w-full">
                <x-input
                class="!bg-transparent"
                placeholder="create a todo"
                borderless shadowless wire:model='todo.description'/>
           </div>

            <div>
                <x-button wire:click='save' emerald label="Add"/>
            </div>
        </div>

        <ul class="space-y-4">
            @foreach ($todoList as $todo)
                <li class="p-4 bg-gray-100 shadow-lg rounded-lg">
                    <div class="flex ">
                        {{ $todo->description }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
