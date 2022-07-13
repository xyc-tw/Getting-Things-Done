@props(['task' => $task])
<div class="grid grid-col-2 w-full justify-between items-start pb-1 gap-1" style="grid-template-columns: 1fr 20px;">
    
    <form action="{{ route('task.check', ['id' => $task->id]) }}" method="POST" class="flex text-sm">
        @csrf
        <input type="checkbox" id="1" class="mr-2 mt-1 focus:ring-0">
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
             {{-- <form method="POST" action="{{ route('task.delete', ['id' => $task->id]) }}">
                @csrf
                @method('DELETE')
                <x-dropdown-link :href="route('task.delete')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Delete') }}
                </x-dropdown-link>



                
            </form> --}}
            
            <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="POST" class="text-sm p-2">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Delete</button>
            </form>
            <form action="{{ route('task.defer', ['id' => $task->id]) }}" method="POST" class="text-sm p-2">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-blue-500">Defer</button>
            </form>
        </x-slot>
    </x-dropdown>
</div>