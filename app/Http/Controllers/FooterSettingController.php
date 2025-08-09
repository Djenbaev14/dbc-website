<?php

namespace App\Http\Controllers;

use App\Http\Resources\FooterSettingResource;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function index(){
        $setting = FooterSetting::firstOrFail();
        return $this->responsePagination($setting, new FooterSettingResource($setting));
    }
}
