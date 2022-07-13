<x-app-layout>
    <div class="container m-auto px-6 md:px-12 xl:px-6 text-gray-900 text-base" style="height: calc (100vh - 80px)">
        <div class="grid gap-2 my-2 md:grid-rows-2 lg:grid-cols-3">  
            <div class="row-span-2 p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col p-6 relative card firststep overflow-y-hidden">
                <div class="relative z-10">
                    {{-- title --}}
                    <div class="pb-2">
                        <h2 class="font-bnb text-2xl text-blue-600">Stuff in your mind...</h2>                
                    </div>
                    {{-- add task --}}
                    <form method="POST" action="{{ route('add') }}" class="text-xs relative">
                        @csrf
                        <x-input id="content" class="block mt-1 w-full" type="text" placeholder="Write it down..." name="content" value="" required/>
                        <button type="submit" class="absolute right-0 top-0 p-1"><img src="icons/add.svg" alt="add" width="27px"></button>
                    </form>
                    {{-- content --}}
                    <div class="m-2 mt-4">
                    @if($tasks->count())
                        @foreach ($tasks as $task )
                            <x-task :task="$task"/>
                        @endforeach
                        {{-- {{ $posts->links() }} --}}
                    @else
                        <p>Write the things in your mind down!</p>
                    @endif
                    </div>
                </div>
            </div>

            {{-- @foreach ($projects as $project )
                <x-project :project="$project"/>
            @endforeach --}}

            <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col sm:space-x-8 p-6 relative card someday">
                <div class="relative z-10">
                    <h2 class="font-bnb pb-2 text-2xl text-blue-600 border-b border-gray-300 ">-> Someday maybe</h2>
                </div>
            </div>
            <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col sm:space-x-8 p-6 relative card lessthan2">
                <div class="relative z-10">
                    <h2 class="font-bnb pb-2 text-2xl text-blue-600">-> Less than 2 mins</h2>
                </div>
            </div>
            <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col sm:space-x-8 p-6 relative card defer">
                <div class="relative z-10">
                    <h2 class="font-bnb pb-2 text-2xl text-blue-600">-> Defer</h2>
                </div>
            </div>
            <div class="p-6 border border-gray-100 rounded-xl bg-gray-50 flex-col sm:space-x-8 p-6 relative card delegate">
                <div class="relative z-10">
                    <h2 class="font-bnb pb-2 text-2xl text-blue-600">-> Delegate</h2>
                </div>
            </div>   
        </div>
    <div class="flex m-4 bg-purple-100 h-96">
        project area
    </div>
    </div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12"> --}}
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
</x-app-layout>
