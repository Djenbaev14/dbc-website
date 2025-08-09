<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::orderBy('id','desc')->get();
        return $this->responsePagination($partners, PartnerResource::collection($partners));
    }
}
