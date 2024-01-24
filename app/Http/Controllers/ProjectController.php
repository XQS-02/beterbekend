<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use App\Models\Logs;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    # Show all projects
    public function index(){
        $projects = Project::all();
        #dd($project);
        return view('projects.index', [
            'projects' => $projects
        ]);

    }

    # Show a project and return the database information coresponding to that project
    public function show($id){
        $project = Project::find($id);
        $logs = Logs::where('project_id', $id)->get();
        $hours = Hours::where('project_id', $id)->get();


        return view('projects.show', [
            'project' => $project,
            'logs' => $logs,
            'hours' => $hours
        ]);
    }

    # Create project page
    public function create(){
        return view('projects.create');
    }

    # Create a new project with a name and description
    public function store(){
        $attributes = Request()->validate([
            "name" => ["required"],
            "description" => ["required"]
        ]);

        $name = $attributes["name"];
        $description = $attributes["description"];

        $project = Project::create([
            "name" => $name,
            "description" => $description,
            "user_id" => Auth()->id()
        ]);

        return redirect("/projects/".$project->id);
    }

    # Go to the edit page of a project to change it's name or description
    public function edit($id){
        $project = Project::find($id);
        return view('projects.edit')->with([
            'project' => $project,
        ]);

    }

    # Update the database with new information of a project
    public function update($id){
        $attributes = Request()->validate([
            "name" => ["required"],
            "description" => ["required"]
        ]);

        $name = $attributes["name"];
        $description = $attributes["description"];

        $project = Project::find($id);
        $project->update([
            "name" => $name,
            "description" => $description,
        ]);

        return redirect("/projects/".$project->id);
    }
}
