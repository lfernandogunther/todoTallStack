<div
    x-data="{
        hover: null
    }"
    class="flex justify-center min-h-screen w-full  bg-teal-600">
    <div class="w-full p-4 md:max-w-2xl">
        <div class="sticky top-0  mb-8 w-full">
            <livewire:todo.store />
        </div>

        <ul class="space-y-4">
            @foreach ($todoList as $todo)
                <li wire:key="list:{{ $todo->id }}" class="body-hidden flex justify-between gap-2 p-4 bg-gray-100 shadow-lg rounded-lg ">
                    <livewire:todo.toggle wire:key="toggle:{{ $todo->id }}" :todo="$todo"/>

                    <div @class(['line-through' => $todo->done, 'w-full'])>{{ $todo->description }}</div>

                    <div class="flex-table-hidden-actions flex justify-between gap-2">
                        @if(!$todo->done)
                            <x-button id="todo.edit:{{ $todo->id }}" wire:click="edit('{{ $todo->id }}')" rounded flat primary icon="pencil"/>
                        @endif

                        <livewire:todo.delete wire:key="delete:{{ $todo->id }}" :todo="$todo" />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
