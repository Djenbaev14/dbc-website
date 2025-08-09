<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvantageResource;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index(){
        $advantages = Advantage::orderBy('id','desc')->get();
        return $this->responsePagination($advantages, AdvantageResource::collection($advantages));
    }
}
