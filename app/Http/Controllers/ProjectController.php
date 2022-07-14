<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function addtask(Request $request, $id)
    {
        if($request->remark){
            $request->user()->tasks()->create([
            'content' => $request->task,
            'remark' => $request->remark,
            'project_id' => $id
        ]);
        }else{
            $request->user()->tasks()->create([
            'content' => $request->task,
            'project_id' => $id
            ]);
        }
        
       
        return back();
    }

    public function destroy($id)
    {
        $project = DB::table('projects')->where('id',"=", $id);
        $project->delete();
        return back();
    }
}
