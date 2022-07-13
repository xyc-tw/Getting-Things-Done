<x-app-layout>
    <div class="container m-auto px-6 md:px-12 xl:px-6 text-gray-900 text-base" style="height: calc (100vh - 80px)">
        <div class="grid gap-2 my-2 md:grid-rows-2 lg:grid-cols-3">  
            
            @foreach ($projects as $project)
                <x-project :project="$project"/>
            @endforeach
      
        </div>
    {{-- <div class="flex m-4 bg-purple-100 h-96">
        project area
    </div> --}}
    </div>
</x-app-layout>
