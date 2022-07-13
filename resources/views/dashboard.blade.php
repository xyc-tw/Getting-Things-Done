<x-app-layout>
    <div class="container m-auto px-6 md:px-12 xl:px-6 text-gray-900 text-base" style="height: calc (100vh - 80px)">
        <div class="grid gap-2 my-2 md:grid-rows-2 lg:grid-cols-3">  
            
            @foreach ($projects as $project)
                <x-project :project="$project"/>
            @endforeach
      
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
