<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogsController extends Controller
{

    # Add logs to a project
    public function logs($id){
        $attributes = Request()->validate([
            "logs" => ["required"],
        ]);

        $logs = $attributes["logs"];
        $project = Project::find($id);

        $log = Logs::create([
            "description" => $logs,
            "project_id" => $id
        ]);

        return redirect("/projects/".$project->id);
    }
}
