<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('frontend/singin');
    }
}
