<x-app-layout>
    <div class="p-2 mx-auto grid grid-rows-3 grid-cols-4" style="height:calc(100vh - 80px);">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm m-2 p-4 flex" style="grid-area: 1 / 1 / 2 / last-line;">
            <div><img src="brain.jpg" class="h-full w-auto" /></div>
            <p>dsagadfbfadnadfnadfn</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm m-2 p-4" style="grid-area: 2 / 1 / last-line / 2;">
            Someday / Maybe
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm m-2 p-4" style="grid-area: 2 / 2 / last-line / 3;">
            < 2 mins
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm m-2 p-4" style="grid-area: 2 / 3 / last-line / 4;">
            Defer
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm m-2 p-4" style="grid-area: 2 / 4 / last-line / last-line;">
            Delegate
        </div>   
    </div>
    <div class="flex m-4 bg-purple-100 h-96">
        project area
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
