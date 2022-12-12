<?php


use App\Http\Controllers\Api\AssignmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SocietyController;
use App\Http\Controllers\Api\UnionsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'authenticate']);
        
Route::post('reset-and-mail', [MailController::class, 'resetAndMail'])
        ->name('reset.password');

Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);        
        
        //PROJECT
        Route::apiResource('project', ProjectController::class); 
        
        Route::get('admin/project', [ProjectController::class,'projectInOneSociety'])
                ->name('project.list.admin');
        
                Route::get('/admin/search-project/{name}', [ProjectController::class, 'search' ])
                ->name('search.project.into.Society');
        
                Route::get('user-project', [ProjectController::class, 'userProject'])
                ->name('User.Project.Society');

        Route::get('total-project-done', [ProjectController::class, 'totalProjectValitated'])
                ->name('total.project.valitated');
        
        Route::get('sa/search-project/{toSearch}', [ProjectController::class, 'searchSAProject'])
                ->name('search.SA.project');


        //ASSIGNMENT
        Route::post('assignment', [AssignmentController::class, 'assignSPT'])
        ->name('assignment.SPT');
        Route::get('list-assignments', [AssignmentController::class, 'assignments'])
        ->name('list.assignments');      
        
        Route::get('userAssignedTask/{task_id}', [AssignmentController::class, 'userAssignedTask'])
        ->name('userAssignedTask');
        
        Route::get('assign-filter/{status}',  [AssignmentController::class, 'assignFilter'])
        ->name('assign.filter');
        
        Route::get('unassigned-task', [AssignmentController::class, 'unassignedList'])
        ->name('unassigned.task.list');
        
        Route::put('assign-user',  [AssignmentController::class, 'assignAUser'])
        ->name('assign.a.task.to.a.user');
        
        Route::put('update-status/{status_id}', [AssignmentController::class, 'updateStatus'])
        ->name('update.status');
        
        Route::get('data-user-chart', [AssignmentController::class, 'dataUserChart'])
        ->name('data.user.chart');
        
        
        //USERS
        Route::apiResource('user', UserController::class);

        Route::get('current-user', [UserController::class, 'currentUser'])
        ->name('current.user');

        Route::get('admin/user', [UserController::class, 'userInOneSociety'])
        ->name('users.list.admin');
        
        Route::get('/admin/search-user/{idorname}', [UserController::class, 'searchUserAdmin'])
        ->name('search.users.admin');
        
        Route::get('sa/search-user/{toSearch}', [UserController::class, 'searchUserSA'])
        ->name('search.user.SA');
        
        
        
        //TASKS
        Route::apiResource('task', TaskController::class);  

        Route::get('admin/task', [TaskController::class, 'taskInOneSociety'])
        ->name('task.list.admin');
        
        Route::get('/admin/search-task/{name}', [TaskController::class, 'search' ])
                ->name('search.task.in.society');
        
                Route::get('one-user/tasks', [TaskController::class, 'taskOneUser'])
                ->name('list.tasks.one.users');
                
        Route::get('/user/search-task/{toSearch}', [TaskController::class, 'searchUserTask' ])
        ->name('user.search.task');
        
        Route::get('user-task-project/{project_id}', [TaskController::class, 'userTaskProject'])
        ->name('user.task.one.project');
        
        Route::get('sa/search-task/{toSearch}', [TaskController::class, 'searchSATask'])
                ->name('search.SA.task');
        
        Route::get('task-assigned-project/{project_id}/{status_id}', [TaskController::class, 'taskAssignedInProject'])
                ->name('task.assigned.in.project');
                
                
        //SOCIETY
        Route::apiResource('society', SocietyController::class);

        Route::get('search-society/{toSearch}', [SocietyController::class, 'search'])
                ->name('search.society');
        
                
        //UNION
        Route::get('countPTU', [UnionsController::class, 'countPTU'])
                ->name('count.PTU');
     
});
   


