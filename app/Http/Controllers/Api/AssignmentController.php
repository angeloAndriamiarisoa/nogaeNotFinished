<?php

namespace App\Http\Controllers\Api;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignRef;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentRessource;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Assigns a task in a project that is in a society,
     * S for society,
     * P for project,
     * T for task
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function assignSPT(Request $request)
    {
        $exists = Assignment::where('assignments.society_id', '=', Auth::user()->society_id)
                                ->where('assignments.project_id', '=',$request->project_id)
                                ->where('assignments.task_id', '=', $request->task_id)
                                ->where('assignments.user_id', '=', $request->user_id)
                                ->first();  
        if($exists == null){
            Assignment::create([
                'society_id' => Auth::user()->society_id,
                'project_id' => $request->project_id,
                'task_id' => $request->task_id,
                'user_id' => $request->user_id  
            ]);
            return response('', 200);
        }

        return response()->json([
            'error' => 'This assignment already exists'
        ], 500);

    }
    /**
     * Assign a task that don't have any user assigned
     * 
     * @param \Illuminate\Http\Request $request
     * 
     */
    public function assignAUser (Request $request) 
    {
        Assignment::where('society_id', Auth::user()->society_id)
        ->where('project_id', $request->project_id)
        ->where('task_id', $request->task_id)
        ->whereNull('user_id')
        ->update(['user_id' => $request->user_id]);
    }

    
    /**
     * Update the assign 
     * 
     * @param \Illuminate\Http\Request $request
     * @param $current_status_id    The status to update 
     * 
     */
    public function updateStatus (Request $request, $current_status_id) 
    {
        Assignment::where('society_id', Auth::user()->society_id)
            ->where('project_id', $request->project_id)
            ->where('task_id', $request->task_id)
            ->where('status_id', $current_status_id)
            ->update(['status_id' => $request->status_id]);
    }
    /**
     *   Get list of task assignments in a project in a society
     * 
     *  @param \Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function userAssignedTask ($task_id) : AnonymousResourceCollection
    {
        $response = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
            ->join('projects', 'assignments.project_id', '=', 'projects.id')
            ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
            ->join('users', 'assignments.user_id', '=', 'users.id')
            ->select('users.name as user', 'societies.name as society', 'projects.name as project', 'tasks.name as task')
            ->where('societies.id', '=', Auth::user()->society_id)
            ->where('tasks.id', '=', $task_id)
            ->get();    
        return AssignmentRessource::collection($response);
    }

    /**
     *  Get assignment list
     * 
     * @param String|int $society_id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function assignments() : AnonymousResourceCollection
    {
         $response = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->select('users.name as user', 'societies.name as society', 'projects.name as project', 'tasks.name as task')
        ->where('societies.id', '=', Auth::user()->society_id)
        ->get();

        return AssignmentRessource::collection($response);

    }

    /**
     *  Get unassignment list
     * 
     * @param String|int $society_id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function unassignedList() 
    {
        $response = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->select('societies.name as society', 'projects.id as project_id', 'projects.name as project', 'tasks.id as task_id', 'tasks.name as task')
        ->where('societies.id', '=', Auth::user()->society_id)
        ->whereNull('assignments.user_id')
        ->get();
        return AssignmentRessource::collection($response);
    }

    /**
     * List assignments filtered per status
     * 
     * @param $status 
     * 
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function assignFilter($status)
    {
        $tasks = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->join('status', 'assignments.status_id', '=', 'status.id')
        ->select('societies.name as society', 'projects.id as project_id', 'projects.name as project', 'tasks.id as task_id', 'tasks.name as task')
        ->where('societies.id', '=',  Auth::user()->society_id)
        ->where('assignments.status_id', '=', $status)
        ->get();

        return AssignmentRessource::collection($tasks); 
    }
      /**
     *   Get list of chart pourcentage all of a user in a company
     * 
     *  @param \Illuminate\Http\Request $request
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function dataUserChart () 
    {
        $assignements = Assignment::select('tasks.id')
        ->where('assignments.society_id', '=', Auth::user()->society_id)
        ->where('assignments.user_id', '=', Auth::user()->id)
        ->distinct()
        ->count();
        $totalTaskdone = Assignment::select('assignments.status.id')
        ->where('assignments.society_id', '=', Auth::user()->society_id)
        ->where('assignments.user_id', '=', Auth::user()->id)
        ->where('assignments.status_id', '=', '2')
        ->count();  
        $totalTaskValidate = Assignment::select('assignments.status.id')
        ->where('assignments.society_id', '=', Auth::user()->society_id)
        ->where('assignments.user_id', '=', Auth::user()->id)
        ->where('assignments.status_id', '=', '3')
        ->count();  
        
        $data = new Collection([
            'assignement'=> $assignements,
            'done'=>$totalTaskdone,
            'validate'=>$totalTaskValidate 
        ]);

            return AssignmentRessource::collection(['data' => $data]);
    }

}
