<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CandidateProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id = Auth::user()->id;
        // $data['user']= User::where('id', $id)->first();
        // $data['profile'] = CandidateProfile::all();
        // return view('frontend.profile.index',$data);
        $id = Auth::user()->id; 
        $data['user'] = User::find($id); 
        $data['profile'] = CandidateProfile::where('user_id', $id)->first(); 
        return view('frontend.profile.index', $data);

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filename = time() . '.' . $request->photo->extension();
        $data = [
            'contact'=> $request->contact,
            'bio'=> $request->bio,
            'address'=> $request->address,
            // 'user_id'=> $request->email,
            'photo'=> $filename,
        ];
        // dd($data);
        if(CandidateProfile::create($data)){
            $request->photo->move('uploads', $filename);
          return redirect('/candidate-profile')->with('msg','Successfully Entry');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['profile'] = CandidateProfile::find($id);
        $data['user'] = User::all();
        return view('frontend.profile.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
