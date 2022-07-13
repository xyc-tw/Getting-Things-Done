<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        
        
        event(new Registered($user));
        
       
        $user->projects()->create([
            'name' => "stuffs",
            'description' => ""
        ]);
        $user->projects()->create([
            'name' => "maybe",
            'description' => ""
        ]);
        $user->projects()->create([
            'name' => "lessthan2",
            'description' => ""
        ]);
        $user->projects()->create([
            'name' => "defer",
            'description' => ""
        ]);
        $user->projects()->create([
            'name' => "delegate",
            'description' => ""
        ]);
        
        Auth::login($user);

     
        
        // return redirect()->route('dashboard', ['user' => $user]);
        // return redirect(RouteServiceProvider::HOME, ['user' => $user]);
        return redirect(RouteServiceProvider::HOME);
    }
}
