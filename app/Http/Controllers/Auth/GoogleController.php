<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_registered = User::where('email', $user->email)->first();
            if($is_registered){
                Auth::login($is_registered);;
                
            }else{

                $newUser = User::create([
                    'google_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->name.'@'.$user->id)
                ]);
                
                $newUser->projects()->create([
                    'name' => "stuffs",
                    'description' => ""
                ]);
                $newUser->projects()->create([
                    'name' => "maybe",
                    'description' => ""
                ]);
                $newUser->projects()->create([
                    'name' => "lessthan2",
                    'description' => ""
                ]);
                $newUser->projects()->create([
                    'name' => "defer",
                    'description' => ""
                ]);
                $newUser->projects()->create([
                    'name' => "delegate",
                    'description' => ""
                ]);

                Auth::login($newUser);;


            }

           return redirect()->route('dashboard');
        
            // try {
      
            // $user = Socialite::driver('google')->user();
       
            // $findUser = User::where('google_id', $user->id)->first();
       
            // if($findUser){
       
            //     Auth::login($findUser);
               
            //     return redirect()->route('dashboard');
       
            // }else{
            //     $newUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'google_id'=> $user->id,
            //         'password' => encrypt('123456dummy')
            //     ]);
      
            //     Auth::login($newUser);
                
            //     return redirect()->route('dashboard');
            // }
      
        } catch (Exception $e) {
            dd($e);
            dd($e->getMessage());
        }
    }
}