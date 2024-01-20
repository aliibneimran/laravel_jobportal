<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['jobs'] = Job::all();
        $data['locations'] = Location::all();
        $data['categories'] = Category::all();
        return view('frontend/home',$data);
    }
}
