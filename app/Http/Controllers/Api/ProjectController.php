<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProjectResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        return ProjectResource::collection(Project::all());
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'society_id' => Auth::user()->society_id
        ])->get()->last();

        return ProjectResource::collection(['project'=>$project]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) 
    {
        return ProjectResource::make($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $project->update($request->only(['name', 'description']));
        return ProjectResource::make($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->noContent();
    }

    /**
     * List all projects into a society
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * 
     */
    public function projectInOneSociety()
    {
        $projects = Project::where('society_id', Auth::user()->society_id)->get();

        return ProjectResource::collection(['projects' => $projects]);
    }

    /**
     * Search for one or more projects by name
     * 
     * @param String|int $name name to search
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search ($name) : AnonymousResourceCollection
    {
        $project = Project::where('society_id', Auth::user()->society_id)
                        ->where('name','like', '%'. $name .'%')
                        ->get();

        return ProjectResource::collection($project); 
    }

    /**
     *   Get list of projects of a user in a company
     *  
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function userProject () : AnonymousResourceCollection
    {
        $project = [];
        $response = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
            ->join('projects', 'assignments.project_id', '=', 'projects.id')
            ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
            ->join('users', 'assignments.user_id', '=', 'users.id')
            ->select('projects.id as id','projects.name as name', 'projects.description as description')
            ->where('societies.id', '=', Auth::user()->society_id)
            ->where('users.id', '=',  Auth::user()->id)
            ->distinct()
            ->get();

            foreach ($response as $r) {
                $total = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
                ->join('projects', 'assignments.project_id', '=', 'projects.id')
                ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
                ->join('users', 'assignments.user_id', '=', 'users.id')
                ->select('tasks.id')
                ->where('societies.id', '=', Auth::user()->society_id)
                ->where('projects.id', '=', $r->id)
                ->where('users.id', '=',  Auth::user()->id)
                ->distinct()
                ->count();
                $totalTaskdone = Assignment::join('societies', 'assignments.society_id', '=', 'societies.id')
                ->join('projects', 'assignments.project_id', '=', 'projects.id')
                ->join('tasks', 'assignments.task_id', '=', 'tasks.id')
                ->join('users', 'assignments.user_id', '=', 'users.id')
                ->select('assignments.status.id')
                ->where('societies.id', '=', Auth::user()->society_id)
                ->where('projects.id', '=', $r->id)
                ->where('users.id', '=',  Auth::user()->id)
                ->where('assignments.status_id', '=', '2')
                ->count();  
                $result = floor(($totalTaskdone/$total)*100) . "%";
                $data = [
                    'id' => $r->id,
                    'name' => $r->name,
                    'description' => $r->description,
                    'percentage' => $result,
                    
                ];
                array_push($project, $data);


            }
        
        return ProjectResource::collection($project);
    }

    /**
     * Total of the projects done
     * 
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function totalProjectValitated () :AnonymousResourceCollection
    {
        $totalProjectDone = 0;
        $projects = Project::get();
        

        foreach ($projects as $project) {
            $totalTasks = Assignment::join('projects', 'assignments.project_id', '=', 'projects.id')
                                ->select('assignments.task_id')
                                ->where('projects.id', '=', $project->id)
                                ->distinct()
                                ->count();

            if($totalTasks == 0)
                continue;

            $totalTasksValidated = Assignment::where('project_id', '=', $project->id)
                                        ->where('assignments.status_id', '=', '3')
                                        ->count(); 

            if($totalTasks == $totalTasksValidated)
                $totalProjectDone += 1;

        }
        $data = new Collection(['total' => $totalProjectDone]);
        return ProjectResource::collection(['data'=> $data]);
    }

    /**
     * Search project for super admin
     * 
     *  @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchSAProject ($toSearch) : AnonymousResourceCollection
    {
        $projects = Project::where(function ($query) use ($toSearch) {
                        $query->where('id', 'like', '%'. $toSearch .'%')
                        ->orWhere('name', 'like', '%'. $toSearch .'%');
                })->get();
        
        return ProjectResource::collection($projects);

    }

}