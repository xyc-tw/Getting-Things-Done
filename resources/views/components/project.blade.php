@props(['project' => $project])

<div class=" {{ ($project->name == 'stuffs' ? 'row-span-2': '') }}  py-3 px-4 border border-gray-100 rounded-xl p-6 relative card {{ $project->name }}">
    <div class="relative flex-col z-10 h-full overflow-hidden">
        
        {{-- title --}}
        <div class="w-full flex justify-between ">
            <h2 class="font-bnb text-2xl text-blue-600">{{ $project->name }}</h2> 
            
            {{-- delete and add task button only in new-build project --}}
            @if (($project->name != "stuffs") and ($project->name != "maybe") and ($project->name != "lessthan2") and ($project->name != "defer") and ($project->name != "delegate"))
            <div class="flex">
                {{-- delete task --}}
                <form action="{{ route('project.delete', ['id' => $project->id]) }}" method="POST" class="flex text-sm  py-1">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-blue-500"><img src="icons/delete.png" alt="delete" width="28px"></button>
                </form> 
                {{-- add task --}}
                <form action="{{ route('project.addtask', ['id' => $project->id]) }}" class="relative text-sm" id="addtask-field" method="POST" autocomplete="off">
                    @csrf
                    <img src="icons/plus.png" alt="add" width="28px" id="addtask" class="mt-1 ml-1">
                    <div id="addtask-input" class="absolute -left-40 z-10 bg-gray-100 bg-opacity-80 border border-gray-200 rounded-lg flex-col px-3 py-2 w-48" style="top: -6px">
                        <x-input class="block w-full" type="text" placeholder="add task" name="task" value="" required/>
                        <x-input class="block mt-2 w-full" type="text" placeholder="add remark" name="remark" value=""/>
                        <button type="submit" class="absolute right-0 top-0 p-1 hidden"></button>
                    </div> 
                </form>
            </div>
            @endif               
        </div>
        
        {{-- add task input only in stuffs project--}}
        @if($project->name == "stuffs")
        <form class="text-xs relative" method="POST" action="{{ route('add') }}" autocomplete="off">
            @csrf
            <x-input id="content" class="block mt-2 w-full" type="text" placeholder="Write it down..." name="content" value="" required/>
            <button type="submit" id="add-stuff-btn" class="absolute right-0 top-0 p-1"><img src="icons/add.svg" alt="add" width="27px"></button>
        </form>
        @endif

        {{-- content --}}
        <div class="m-2 mt-4 overflow-y-auto" style="{{ ($project->name == "stuffs" ? 'height: calc( 100% - 32px - 44px - 24px)': 'height: calc( 100% - 32px - 24px)') }}" >
            @if($tasks = $project->tasks)
                @foreach ($tasks as $task )
                    <x-task :task="$task"/>
                @endforeach
            @endif
        </div>
       
    </div>
</div>


