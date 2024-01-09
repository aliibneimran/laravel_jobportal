<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function store(LoginRequest $request)
    {
        $user = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$user['email'], 'password'=>$user['password']])){
            return redirect()->route('admin.dashboard'); 
        }else{
            return redirect('admin/login')->with('msg', 'Problem');
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function register(){
        return view('admin.register');
    }
}
