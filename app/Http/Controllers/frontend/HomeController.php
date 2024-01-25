<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $data['locations'] = Location::withCount('job')->get();
        $data['locations'] = Location::with('job')->get();
        $data['jobs'] = Job::latest()->take(3)->get();
        $data['locations'] = Location::latest()->take(4)->get();
        $data['industries'] = Industry::all();
        $data['categories'] = Category::all();
        return view('frontend/home',$data);
    }


}
