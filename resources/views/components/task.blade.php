@props(['task' => $task])

<div class="grid grid-col-2 w-full justify-between items-start pb-1 gap-1" style="grid-template-columns: 1fr 20px;">
    
    <form action="{{ route('task.check', ['id' => $task->id]) }}" method="POST" class="text-sm items-start">
        @csrf
        <button type="submit" class="flex  w-full">
            @if($task->is_completed)
            <img src="icons/check.png" width="28px" class="p-1">
            @else
            <img src="icons/unchecked.png" width="28px" class="p-1">
            @endif
            <div class="flex w-full justify-between">
                <p class=" {{ ($task->is_completed ? 'line-through': '') }} text-base pl-1" style="padding-top: 2px">{{ $task->content }}</p>
                @if($task->remark)
                <p class=" {{ ($task->is_completed ? 'line-through': '') }} text-sm pl-1 text-orange-600" style="padding-top: 2px">
                {{ $task->remark }}</p>
                @endif
            </div>
        </button>
    </form>
    
    <x-dropdown adivgn="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center">
                <div class="ml-1 mt-1">
                    <img src="icons/options.svg" alt="options">
                </div>
            </button>
        </x-slot>
        <x-slot name="content" class="p-4">
            {{-- delete --}}
            <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Delete</button>
            </form>

            {{-- edit --}}
            <p class="w-8/9 bg-gray-300 h-px t-2 m-1"></p>
            <form action="{{ route('task.edit', ['id' => $task->id]) }}" class="text-sm p-2" method="POST" autocomplete="off">
                @csrf
                <label>Edit</label>
                <x-input class="block mt-2 w-full h-7" type="text" placeholder="add task" name="task" value="{{ $task->content }}" required/>
                     @if (($task->project()->first()->name != "stuffs") and ($task->project()->first()->name != "maybe") and ($task->project()->first()->name != "lessthan2"))
                    <x-input class="block mt-2 w-full h-7" type="text" placeholder="add remark" name="remark" value="{{ $task->remark }}"/>
                    @endif
                <button type="submit" class="absolute right-0 top-0 p-1 hidden"></button>
            </form>

            {{-- Clarify --}}
            @if (($task->project()->first()->name == "stuffs") or ($task->project()->first()->name == "maybe") or ($task->project()->first()->name == "lessthan2") or ($task->project()->first()->name == "defer") or ($task->project()->first()->name == "delegate"))
                {{-- separate line --}}
                <p class="w-8/9 bg-gray-300 h-px t-2 m-1"></p>
                {{-- stuffs --}}
                @if($task->project()->first()->name != "stuffs" )
                <form action="{{ route('task.stuffs', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500">Back to stuffs bin</button>
                </form>
                @endif
                {{-- maybe --}}
                @if($task->project()->first()->name != "maybe" )
                <form action="{{ route('task.maybe', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500">Maybe</button>
                </form>
                @endif
                {{-- lessthan2 --}}
                @if($task->project()->first()->name != "lessthan2" )
                <form action="{{ route('task.lessthan2', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500">Less than 2 min</button>
                </form>
                @endif
                {{-- defer --}}
                @if($task->project()->first()->name != "defer" )
                <form action="{{ route('task.defer', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1" autocomplete="off">
                    @csrf
                    <div class="flex justify-between">
                        <button type="submit" class="text-gray-800 hover:text-blue-500">Defer</button>
                        <x-input class="block mr-2" style="width: 100px; height: 25px;" type="text" placeholder="add time" name="content"/>
                    </div>
                </form>
                @endif
                {{-- delegate --}}
                @if($task->project()->first()->name != "delegate" )
                <form action="{{ route('task.delegate', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1" autocomplete="off">
                    @csrf
                    <div class="flex justify-between">
                        <button type="submit" class="text-gray-800 hover:text-blue-500">Delegate</button>
                        <x-input class="block mr-2" style="width: 100px; height: 25px;" type="text" placeholder="to whom" name="content"/>
                    </div>
                </form>
                @endif
                {{-- separate line --}}
                <p class="w-8/9 bg-gray-300 h-px t-2 m-1"></p>
                {{-- make new project --}}
                <form action="{{ route('task.makeproject', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500">Make a Project</button>
                </form>
            @endif      
        </x-slot>
    </x-dropdown>
</div>