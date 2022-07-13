@props(['project' => $project])

<div class=" {{ ($project->name == 'stuffs' ? 'row-span-2': '') }} p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col p-6 relative card {{ $project->name }} overflow-y-hidden">
    <div class="relative z-10">
        
        {{-- title --}}
        <div class="pb-2">
            <h2 class="font-bnb text-2xl text-blue-600">{{ $project->name }}</h2>                
        </div>
        
        {{-- add task only in first step project--}}
        @if($project->name == "stuffs")
        <form method="POST" action="{{ route('add') }}" class="text-xs relative">
            @csrf
            <x-input id="content" class="block mt-1 w-full" type="text" placeholder="Write it down..." name="content" value="" required/>
            <button type="submit" class="absolute right-0 top-0 p-1"><img src="icons/add.svg" alt="add" width="27px"></button>
        </form>
        @endif

        {{-- content --}}
        <div class="m-2 mt-4">
            @if($tasks = $project->tasks)
                @foreach ($tasks as $task )
                    <x-task :task="$task"/>
                @endforeach
            @else
                <p>Write the things in your mind down!</p>
            @endif
        </div>
       
    </div>
</div>