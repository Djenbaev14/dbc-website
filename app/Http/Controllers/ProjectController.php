<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::orderBy('id','desc')->get();
        return $this->responsePagination($projects, ProjectResource::collection($projects));
    }
    // view 
    public function show(Project $project){
        return new ProjectResource($project);
    }
}
