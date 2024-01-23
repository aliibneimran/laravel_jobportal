<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        // dd(Hash::make(123456));
        if(!empty(Auth::check())){
            if(Auth::user()->role == 1){
                return redirect('admin/dashboard');  
            }else if(Auth::user()->role == 2){
                return redirect('company/dashboard'); 
            }else if(Auth::user()->role == 3){
                return redirect('candidate/dashboard');
            }else if(Auth::user()->role == 4){
                return redirect('editor/dashboard'); 
            }  
        }
        return view('auth.login');
    }
    public function AuthLogin(Request $request){
        // dd($request->all());
        $remember = !empty($request->remember)?true:false;
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password],$remember)){
            if(Auth::user()->role == 1){
                return redirect('admin/dashboard');  
            }else if(Auth::user()->role == 2){
                return redirect('company/dashboard'); 
            }else if(Auth::user()->role == 3){
                return redirect('candidate/dashboard');
            }else if(Auth::user()->role == 4){
                return redirect('editor/dashboard'); 
            }
        }
        else{
            return redirect()->back()->with('msg','Please enter currect email and password');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
    
}
