<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        // $tasks = DB::table('tasks')->where('user_id', '=', $this->user->id)->get();
        // $projects = DB::table('projects')->where('user_id', '=', $this->user->id)->get();
    
        // return view('dashboard', [
        //     'tasks' => $tasks,
        //     'projects' => $projects
        // ]);

        // return view('/dashboard');
    }
}
