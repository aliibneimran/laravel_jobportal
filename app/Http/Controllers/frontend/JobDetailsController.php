<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Location;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function index($id){
        $data['jobs'] = Job::find($id);
        $data['locations'] = Location::all();
        $data['categories'] = Category::all();
        return view('frontend/jobDetails',$data);
    }
    public function apply(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'cv' => 'mimes:pdf,docx',
        ]);
        $filename = time() . '.' . $request->cv->extension();
        if ($validate) {
            $data = [
                'name'=> $request->name,
                'job_id'=> $request->job_id,
                'email'=> $request->email,
                'contact'=> $request->contact,
                'bio'=> $request->bio,
                'cv'=> $filename,
            ];
        }
        if (Candidate::create($data)) {
            $request->cv->move('uploads/application', $filename);
            return redirect(URL('/'))->with('msg', 'Successfully Apply');
        }
        // dd($data);
    }
    
}
