<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
        $this->user = Auth::user();

        return $next($request);
        });
    }
    
    public function index()
    {
        $projects = Project::where('user_id', $this->user->id)->get();
        
        return view('dashboard', [
            'projects' => $projects
        ]);

        return view('/dashboard');
    }

    public function add(Request $request) 
    {
        // dd("controller called");


        $this->validate($request, [
            'content' => 'required'
        ]);

        $projectId = $request->user()->projects()->where('name','stuffs')->first()->id;
        $request->user()->tasks()->create([
            'content' => $request->content,
            'project_id' => $projectId
        ]);
        
        // return response()->json(
        //     [
        //         'success' => true,
        //         'message' => 'Data inserted successfully'
        //     ]
        // );
        return back();
    }
}

