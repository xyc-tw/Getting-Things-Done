<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="shadow-sm container m-auto px-6 md:px-12 xl:px-6 ">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>

                        <!-- Login & Register -->
                        <div  class="shrink-0 flex items-center">
                                @if (Route::has('login'))
                                <div class="hidden p-2 sm:block">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    @endauth
                                </div>
                               @endif
                        </div> 
                    </div>
                </div>
            </nav>
            <main>
                <div class="container m-auto px-6 md:px-12 xl:px-6 text-gray-900 text-base">
                    <div class="min-h-screen flex-col items-center justify-center">
                        {{-- introduction --}}
                        <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <img src="/images/bookcover.png" width="45%">
                            <div class="flex-col pl-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">What is it about?</h2>
                                <p>Getting Things Done (GTD) is a personal productivity system developed by David Allen and published in a book of the same name.<br>
                                The GTD method rests on the idea of moving all items of interest, relevant information, issues, tasks and projects out of one's mind by recording them externally and then breaking them into actionable work items with known time limits. This allows one's attention to focus on taking action on each task listed in an external record, instead of recalling them intuitively.</p>
                            </div>
                        </div>
                        {{-- workflow --}}
                         <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <div class="flex-col pr-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">How it works?</h2>
                                <p>The GTD workflow consists of few stages: capture, clarify, organize, reflect, and engage.<br>
                                The mind's "reminder system" is inefficient and seldom reminds us of what we need to do at the time and place when we can do it.<br>
                                As GTD relies on external reminders, that's why you can use this website</p>
                            </div>
                            <img src="/images/workflow.jpeg" class="rounded-3xl  " width="45%">
                        </div>
                        {{-- first Step --}}
                        <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <img src="/images/firststep.png" width="45%">
                            <div class="flex-col pl-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">First Step: Capture Everything</h2>
                                <p>Capture anything that crosses your mind. Nothing is too big or small! These items go directly into your inboxes.<br>
                                It will act as the default place to hold all your inputs until you have a chance to organize them.</p>
                            </div>
                        </div>

                        {{-- Clarify --}}
                        <div class="flex-col w-full lg:w-3/4 mx-auto pt-10 ext-center">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Next: Clarify</h2>
                                <p>Now that your inbox is full, the next step is to transform the chaotic clutter of everything you’ve captured into concrete action steps. Go through each item in your inbox, and do one of the following...</p>
                        </div>

                        {{-- someday maybe --}}
                         <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <div class="flex-col pr-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Someday maybe</h2>
                                <p>If it's a non-actionable now but you may need to come back to later,
                                    file it away in a separate folder</p>
                            </div>
                            <img src="/images/someday.png" class="rounded-3xl  " width="35%">
                        </div>
                        {{-- < 2 min --}}
                        <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <img src="/images/lessthan2.png" width="35%">
                            <div class="flex-col pl-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Do it if less than 2 min</h2>
                                <p>If the item will take less than 2 minutes, complete it right away.</p>
                            </div>
                        </div>
                        {{-- Defer --}}
                         <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <div class="flex-col pr-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Defer</h2>
                                <p>If the item needs to be done at a specific date and/or time, 
                                    give the task a due date.</p>
                            </div>
                            <img src="/images/defer-1.png" class="rounded-3xl  " width="45%">
                        </div>
                        {{-- delegate --}}
                        <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 ">
                            <img src="/images/delegate-1.png" width="45%">
                            <div class="flex-col pl-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Delegate</h2>
                                <p>If it can be delegated, assign the task to someone else.</p>
                            </div>
                        </div>
                        {{-- Project --}}
                         <div class="flex w-full lg:w-3/4 mx-auto items-center justify-center pt-10 pb-16 ">
                            <div class="flex-col pr-12">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">Project</h2>
                                <p>If a task requires more than one step, create a project to 
                                    house all of the items associated with it and identify the 
                                    one next action you can take to move the project forward.</p>
                            </div>
                            <img src="/images/project.png" class="rounded-3xl  " width="35%">
                        </div>

                        {{-- Clarify --}}
                        <div class="flex-col w-full lg:w-3/4 pt-10 pb-20 mx-auto text-center">
                                <h2 class="font-bnb pb-2 text-2xl text-blue-600">And thenOrganize, Reflect, and Engage!</h2>
                        </div>

                    </div>
            </main>
        </div>
    </body>
</html>
