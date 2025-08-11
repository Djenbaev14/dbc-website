<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        $feedbacks = Feedback::orderBy('id','desc')->get();
        return $this->responsePagination($feedbacks, FeedbackResource::collection($feedbacks));
    }
}
