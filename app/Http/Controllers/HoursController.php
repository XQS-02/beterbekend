<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use App\Models\Project;
use Illuminate\Http\Request;

class HoursController extends Controller
{

    # Create new hours to a project
    public function hours($id){
        $attributes = Request();

        $hours = $attributes["hours"];
        $minutes = $attributes["minutes"];
        $project = Project::find($id);

        $hour = Hours::create([
            "hours" => $hours,
            "minutes" => 1,
            "project_id" => $id,
            "user_id" => Auth()->id()
        ]);

        return redirect("/projects/".$project->id);
    }
}
