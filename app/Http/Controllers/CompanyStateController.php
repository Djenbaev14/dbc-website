<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyStateResource;
use App\Models\CompanyStat;
use Illuminate\Http\Request;

class CompanyStateController extends Controller
{
    public function index(){
        $setting = CompanyStat::firstOrFail();
        return $this->responsePagination($setting, new CompanyStateResource($setting));
    }
}
