<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     public function show(Task $task)
    {
        return view('task.show', [
            'task' => $task
        ]);
    }

    
}
