<?php

namespace App\Http\Controllers;

use App\Filament\Resources\TopBannerResource;
use App\Http\Resources\BannerResource;
use App\Models\TopBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Add your methods for handling banner-related requests here
    // For example, you might have methods like index, store, update, destroy, etc.
    
    public function index(){
        return new BannerResource(TopBanner::first());
    }

}
