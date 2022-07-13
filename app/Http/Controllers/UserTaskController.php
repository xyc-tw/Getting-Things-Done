<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    public function index(User $user){
        dd($user);
    }
}
