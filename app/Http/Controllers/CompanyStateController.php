<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyStateResource;
use App\Models\CompanyStat;
use Illuminate\Http\Request;

class CompanyStateController extends Controller
{
    public function index(){
        $setting = CompanyStat::first();
        return $this->responsePagination($setting, $setting ? new CompanyStateResource($setting) : null);
    }
}
