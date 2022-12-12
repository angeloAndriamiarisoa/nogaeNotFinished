<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\Project;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required',
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'society_id' => Auth::user()->society_id,
            'project_id' => $request->project_id,
        ])->get()->last();


        return TaskResource::collection(['task' => $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => ['required', 'min:5'],
            'description' => 'required'
        ]);

        $task->update($request->only(['name', 'description']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }

    /**
     * List all tasks into a society
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * 
     */
    public function taskInOneSociety()
    {
        $tasks = Task::where('society_id', Auth::user()->society_id)->get();

        return TaskResource::collection(['tasks' => $tasks]);
    }
    /**
     * Search for one or more tasks by name
     * 
     * @param String|int $name name to search
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search ($name) : AnonymousResourceCollection
    {
        $task = Task::where('society_id', Auth::user()->society_id)
                        ->where('name','like', '%'. $name .'%')
                        ->get();

        return TaskResource::collection($task); 
    }
    /**
     * List all tasks for a user
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function taskOneUser ()
    {
        $tasks = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
            ->join('projects', 'assignments.project_id', '=', 'projects.id')
            ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
            ->join('status', 'assignments.status_id', '=', 'status.id')
            ->select('tasks.*', 'projects.name as project', 'status.libelle as status')
            ->where('societies.id', '=', Auth::user()->society_id)
            ->where('assignments.user_id', '=', Auth::user()->id)
            ->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Search for one or more tasks by name for one user
     * 
     * @param String|int $toSearch
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchUserTask ($toSearch) : AnonymousResourceCollection
    {
        $tasks = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->join('status', 'assignments.status_id', '=', 'status.id')
        ->select('tasks.*', 'projects.name as project', 'status.libelle as status')
        ->where('societies.id', '=',  Auth::user()->society_id)
        ->where('users.id', '=',  Auth::user()->id)
        ->where(function ($query) use ($toSearch){
                $query->where('tasks.id', 'like', '%'. $toSearch .'%')
                ->orWhere('tasks.name', 'like', '%'. $toSearch .'%')
                ->orWhere('status.libelle', 'like', '%'. $toSearch .'%');
        })
        ->get();

        return TaskResource::collection($tasks); 
    }

    /**
     *   Get list of tasks for a user with status
     * 
     *  @param String|Int $project_id
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */

    public function userTaskProject ($project_id) : AnonymousResourceCollection
    {
        $response = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
            ->join('projects', 'assignments.project_id', '=', 'projects.id')
            ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
            ->join('users', 'assignments.user_id', '=', 'users.id')
            ->select('tasks.id as id', 'tasks.name as task', 'assignments.status_id as status_id')
            ->where('societies.id', '=', Auth::user()->society_id)
            ->where('projects.id', '=', $project_id)
            ->where('users.id', '=', Auth::user()->id)
            ->get();  

        return TaskResource::collection($response);
    }

    /**
     * Search task in super admin
     * 
     * @param String $toSearch
     * 
     */
    public function searchSATask ($toSearch) : AnonymousResourceCollection
    {
        $tasks = Task::where(function ($query) use ($toSearch){
            $query->where('id', 'like', '%'. $toSearch .'%')
            ->orWhere('name', 'like', '%'. $toSearch .'%');
        })->get();

        return TaskResource::collection($tasks);
    }

    
    /**
     * Get tasks assigned to employees in a project
     * 
     * @param String|int $project_id
     * @param String|int $status_id
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function taskAssignedInProject ($project_id, $status_id) : AnonymousResourceCollection
    {
        $project = Project::where('id', '=', $project_id)->get();
        $task = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->select('tasks.id as task_id', 'tasks.name as task_name')
        ->where('societies.id', '=', Auth::user()->society_id)
        ->where('projects.id', '=', $project_id)
        ->where('assignments.status_id', '=', $status_id)
        ->distinct()
        ->get();    
        $user = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
        ->join('projects', 'assignments.project_id', '=', 'projects.id')
        ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->select('users.id as user_id', 'users.name as user_name')
        ->where('societies.id', '=', Auth::user()->society_id)
        ->where('projects.id', '=', $project_id)
        ->where('assignments.status_id', '=', $status_id)
        ->get();    
        return TaskResource::collection([
                                            'projects' => $project,
                                            'tasks' => $task,
                                            'users' => $user
                                            ]);
    }
}
