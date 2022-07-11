<x-guest-layout>
    <div class="bg-gray-50 min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        {{-- card container --}}
        <div class="flex bg-white text-gray-500 rounded-3xl shadow-lg w-full overflow-hidden " style="max-width:1000px; height: 550px;">
            {{-- left part: form --}}
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
                 
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />


                    <form method="POST" action="{{ route('login') }}" class="text-xs">
                        @csrf


                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input id="email" class="block mt-1 w-full" type="email" placeholder="E-mail" name="email" :value="old('email')" required/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input id="password" class="block mt-1 w-full"
                            type="password" placeholder="Password" name="password"
                                            required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between mt-4">
                        {{-- <div class="block mt-4"> --}}
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>

                        <x-button class="mt-4 w-full ">
                             {{ __('Log in') }}
                        </x-button>
                    </form>

                        {{-- separate line --}}
                        <div class="flex justify-evenly space-x-2 w-full mt-4">
                            <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
                            <span class="flex-none uppercase text-xs text-gray-400 font-semibold">or</span>
                            <span class="bg-gray-300 h-px flex-grow t-2 relative top-2"></span>
                        </div>


                        {{-- botton box for redirecting to register --}}
                        <div class="flex items-center justify-center mt-4 border border-gray-300 rounded h-12 text-sm">
                            <span class="text-gray-500 pr-2">Already registered?</span>
                            <a class="font-semibold text-blue-600" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>

                </x-auth-card>
            </div>
        

            {{-- right part: cover-2 --}}
            <div class="flex w-1/2 i justify-center items-center">
                <div class="flex-col pr-12 text-center">
                    <img src="cover-2.jpg" class="object-fill" />
                    <a href='https://www.freepik.com/vectors/complete' class="text-xs text-gray-500">Complete vector created by pch.vector - www.freepik.com</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>  