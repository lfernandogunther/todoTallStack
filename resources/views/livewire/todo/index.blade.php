<div class="flex justify-center min-h-screen w-full  bg-teal-600">
    <div class="w-full p-4 md:max-w-2xl">
        <div class="sticky top-0  mb-8 w-full">
            <livewire:todo.store />
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
