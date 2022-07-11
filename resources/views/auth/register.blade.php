<x-guest-layout>
    <div class="bg-gray-50 min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        {{-- card container --}}
        <div class="flex bg-white text-gray-500 rounded-3xl shadow-lg w-full overflow-hidden " style="max-width:1000px; height: 650px;">
            {{-- left part: cover-1 --}}
            <div class="flex w-1/2 i justify-center items-center">
                <div class="flex-col pl-12 text-center">
                    <img src="cover-1.jpg" class="object-fill" />
                    <a href='https://www.freepik.com/vectors/human' class="text-xs text-gray-500">Human vector created by freepik - www.freepik.com</a>
                </div>
            </div>

            {{-- right part: form --}}
            <div class="flex w-1/2 justify-center items-center px-6">
                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="text-gray-500" />
                        </a>
                    </x-slot>

                    {{-- continue with google --}}
                    <a href="{{ route('google.login') }}" class="flex items-center justify-center my-6 w-full py-1
                    text-sm font-semibold text-center text-blue-600 border border-blue-500 rounded hover:bg-blue-100 active:bg-blue-200 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
                        <img src="google.png" class="mr-2 w-6 object-fill" />
                        <span>Continue with google</span>
                    </a>
                 
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}" class="text-xs">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input id="name" class="block mt-1 w-full mb-2" type="text" 
                            placeholder="Name" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input id="email" class="block mt-1 w-full" type="email" placeholder="E-mail" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input id="password" class="block mt-1 w-full" type="password" placeholder="Password" name="password"
                                            required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Repeat your password"
                                            name="password_confirmation" required />
                        </div>
                        <x-button class="mt-4 w-full">
                                {{ __('Register') }}
                        </x-button>
                     </form>
                     
                        {{-- separate line --}}
                        <div class="flex justify-evenly space-x-2 w-full mt-4">
                            <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
                            <span class="flex-none uppercase text-xs text-gray-400 font-semibold">or</span>
                            <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
                        </div>
                        
                        {{-- botton box for redirecting to log in --}}
                        <div class="flex items-center justify-center mt-4 border border-gray-300 rounded h-12 text-sm">
                            <span class="text-gray-500 pr-2">Already registered?</span>
                            <a class="font-semibold text-blue-600" href="{{ route('login') }}">
                                {{ __('Log in') }}
                            </a>
                        </div>
                   
                </x-auth-card>
            </div>
        </div>
    </div>
</x-guest-layout>
