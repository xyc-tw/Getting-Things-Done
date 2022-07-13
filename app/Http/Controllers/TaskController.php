<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['check', 'destroy']);
    }
    
    public function check(Task $id)
    {
        $task = DB::table('tasks')->where('id',"=", $id);
        dd($task);
    }

    public function destroy($id)
    {
        $task = DB::table('tasks')->where('id',"=", $id);
        $task->delete();
        return back();
    }

    
}


