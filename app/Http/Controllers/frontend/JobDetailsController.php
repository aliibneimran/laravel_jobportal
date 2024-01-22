<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function index($id){
        $data['jobs'] = Job::find($id);
        $data['locations'] = Location::all();
        $data['categories'] = Category::all();
        // dd($data);
        return view('frontend/jobDetails',$data);
    }
    
}
