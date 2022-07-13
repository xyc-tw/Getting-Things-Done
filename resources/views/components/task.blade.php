@props(['task' => $task])

<div class="grid grid-col-2 w-full justify-between items-start pb-1 gap-1" style="grid-template-columns: 1fr 20px;">
    
    <form action="{{ route('task.check', ['id' => $task->id]) }}" method="POST" class="flex text-sm">
        @csrf
        {{-- <input type="checkbox" onChange="this.form.submit()" class="mr-2 mt-1 focus:ring-0"> --}}
        <input type="checkbox" class="mr-2 mt-1 focus:ring-0">
        <p class="text-base">{{ $task->content }}</p>
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
            {{-- separate line --}}
            <p class="w-8/9 bg-gray-300 h-px t-2 m-1"></p>
            {{-- syuffs --}}
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
            <form action="{{ route('task.defer', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Defer</button>
            </form>
            @endif
            {{-- delegate --}}
            @if($task->project()->first()->name != "delegate" )
            <form action="{{ route('task.delegate', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Delegate</button>
            </form>
            @endif
            {{-- separate line --}}
            <p class="w-8/9 bg-gray-300 h-px t-2 m-1"></p>
            {{-- make new project --}}
            <form action="{{ route('task.makeproject', ['id' => $task->id]) }}" method="POST" class="text-sm pl-2 py-1">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Make a Project</button>
            </form>
           
        </x-slot>
    </x-dropdown>
</div>