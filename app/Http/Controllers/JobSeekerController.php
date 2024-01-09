<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function login(){
        return view('jobseeker.login');
    }
    public function store(LoginRequest $request)
    {
        $user = $request->all();
        if(Auth::guard('jobseeker')->attempt(['email'=>$user['email'], 'password'=>$user['password']])){
            return redirect()->route('jobseeker.dashboard'); 
        }else{
            return redirect('jobseeker/login')->with('msg', 'Problem');
        }
    }
    public function dashboard(){
        return view('jobseeker.dashboard');
    }
}
