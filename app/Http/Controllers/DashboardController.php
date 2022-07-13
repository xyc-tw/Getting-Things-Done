<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Mail\PostLiked;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->only(['index']);;
    // }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
        // this is getting executed later after the other middleware has ran
        $this->user = Auth::user();

        return $next($request);
        });
    }
    
    public function index()
    {
        // dd(DB::table('tasks')->where('user_id', '=', $this->user->id)->get());
        $tasks = DB::table('tasks')->where('user_id', '=', $this->user->id)->get();
        $projects = DB::table('projects')->where('user_id', '=', $this->user->id)->get();

        dd(DB::table('projects')->where('user_id', '=', $this->user->id)->where('name', '=', "stuffs")->first()->tasks()->toArray());
    
        return view('dashboard', [
            'tasks' => $tasks,
            'projects' => $projects
        ]);

        return view('/dashboard');
    }

    public function add(Request $request) 
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        $projectId = $request->user()->projects()->where('name','stuffs')->first()->id;
        $request->user()->tasks()->create([
            'content' => $request->content,
            'project_id' => $projectId
        ]);
        
        return back();
    }
}
