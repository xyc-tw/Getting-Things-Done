<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Mail\PostLiked;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->only(['index']);;
    // }

    
    public function index()
    {
        $tasks = DB::select('select * from tasks');
       
        return view('dashboard', [
            'tasks' => $tasks
        ]);

        return view('dashboard');
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
