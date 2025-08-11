<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $team = Team::orderBy('id','desc')->get();
        return $this->responsePagination($team, TeamResource::collection($team));
    }
}
