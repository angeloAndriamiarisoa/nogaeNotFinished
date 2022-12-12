<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pivot;
use App\Models\Project;

class TestController extends Controller
{
    public function __invoke()
    {
        $project = DB::table('pivots')
            ->select('id_task')
            ->where("id_society", "=", "1")

            ->get()->count();
        $task = DB::table('pivots')
            ->select('id_task')
            ->where("id_society", "=", "1")
            ->get()->count();

        return response()->json([
            'projectNumber' => $project,
            'taskNumber' => $task
        ]);

    }
}
