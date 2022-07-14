<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
        public function __construct()
    {
        $this->middleware(function ($request, $next) {
        $this->user = Auth::user();

        return $next($request);
        });
    }
    
    public function check($id)
    {
        $task = Task::where('id', $id)->first();
        
        if($task->is_completed) {
            $task->is_completed = false;
        }else {
            $task->is_completed = true;
        }   
        $task->save();
        return back();
    }

    public function stuffs($id)
    {
        $pId = Project::where('user_id', $this->user->id)->where('name', 'stuffs')->first()->id;
        $task = Task::where('id', $id)->first();
        $task->project_id = $pId;
        $task->save();
        return back();
    }

    public function maybe($id)
    {
        $pId = Project::where('user_id', $this->user->id)->where('name', 'maybe')->first()->id;
        $task = Task::where('id', $id)->first();
        $task->project_id = $pId;
        $task->save();
        return back();
    }

    public function lessthan2($id)
    {
        $pId = Project::where('user_id', $this->user->id)->where('name', 'lessthan2')->first()->id;
        $task = Task::where('id', $id)->first();
        $task->project_id = $pId;
        $task->save();
        return back();
    }

    public function defer(Request $request, $id)
    {
        $pId = Project::where('user_id', $this->user->id)->where('name', 'defer')->first()->id;

        $task = Task::where('id', $id)->first();
        $task->project_id = $pId;
        if($request->content){
            $task->remark = $request->content;
        }
        $task->save();
        return back();
    }

    public function delegate(Request $request, $id)
    {
        $pId = Project::where('user_id', $this->user->id)->where('name', 'delegate')->first()->id;
        $task = Task::where('id', $id)->first();
        $task->project_id = $pId;
        if($request->content){
            $task->remark = $request->content;
        }
        $task->save();
        return back();
    }

    public function destroy($id)
    {
        $task = DB::table('tasks')->where('id',"=", $id);
        $task->delete();
        return back();
    }

    public function makeproject($id)
    {
        $task = DB::table('tasks')->where('id',"=", $id);
        $pname = DB::table('tasks')->where('id',"=", $id)->first()->content;

        $this->user->projects()->create([
            'name' => $pname,
            'description' => ""
        ]);
        $task->delete();
        return back();
    }
    
    public function edit(Request $request, $id)
    {
        $task = Task::where('id', $id)->first();
        if($request->task){
            $task->content = $request->task;
        }
        if($request->remark){
            $task->remark = $request->remark;
        }
        $task->save();
        return back();
    }
    
}


