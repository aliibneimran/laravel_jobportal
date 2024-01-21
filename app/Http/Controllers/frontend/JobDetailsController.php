<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function index(){
        $data['jobs'] = Job::all();
        $data['categories'] = Category::all();
        return view('frontend/jobDetails',$data);
    }
}
