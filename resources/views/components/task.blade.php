@props(['task' => $task])
<div class="grid grid-col-3 w-full justify-between items-start pb-1 gap-1" style="grid-template-columns: 18px 1fr 20px;">
    <input type="checkbox" id="1" class="mr-2 mt-1 focus:ring-0">
    <p>{{ $task->content }}</p>
    <x-dropdown adivgn="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center">
                <div class="ml-1 mt-1">
                    <img src="icons/options.svg" alt="options">
                </div>
            </button>
        </x-slot>
        <x-slot name="content" class="p-4">
            <p>Option 1</p>
            <p>Option 2</p>
        </x-slot>
    </x-dropdown>
</div>