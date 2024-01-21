<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CandidateProfile;
use Illuminate\Http\Request;

class CandidateProfileController extends Controller
{
    public function index(){
        $data['candidate'] = CandidateProfile::all();
        return view('frontend/profile');
    }
    public function store(Request $request)
    {
        $data = ['name'=> $request->name];
        if(CandidateProfile::insert($data)){
          return redirect('categories')->with('msg','Successfully Added');
        }
    }
}
