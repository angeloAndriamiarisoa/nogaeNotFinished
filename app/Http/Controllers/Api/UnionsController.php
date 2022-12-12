<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnionsResource;
use Illuminate\Database\Eloquent\Collection;

class UnionsController extends Controller
{
    /**
     * Get the total number of project, task, user
     */
    public function countPTU () 
    {
        $project = Project::all()->count();
        $task =  Task:: all()->count();
        $user = User::all()->count();
        $data = new Collection([
            'project'=> $project,
            'task' => $task,
            'user' => $user
        ]);

        return UnionsResource::collection(['data' => $data]);


    }
 public function countTotalTaskDone()
    {
        $totalTaskdone = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->select('assignments.status.id')
        ->where('assignments.status_id', '=', '2')
        ->count();  
        $assignements = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
    ->join('projects', 'assignments.project_id', '=', 'projects.id')
    ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
    ->join('users', 'assignments.user_id', '=', 'users.id')
    ->select('tasks.id')
    ->distinct()
    ->count();
    return response()->json([
        'assignement'=> $assignements,
        'done'=>$totalTaskdone
    ]) ;
    }
    
}