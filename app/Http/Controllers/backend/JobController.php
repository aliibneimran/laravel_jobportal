<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jobs'] = Job::all();
        $data['locations'] = Location::all();
        return view('backend.jobs.index', $data);
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['locations'] = Location::all();
        return view('backend.jobs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'salary' => 'required|numeric',
            'category' => 'required',
            'location' => 'required',
            'vacancy' => 'required|numeric',
            'photo' => 'mimes:jpg,jpeg,png',
        ]);
        $filename = time() . '.' . $request->photo->extension();
        // dd($request->photo);
        if ($validate) {
            // $tags = implode(",", $request->get('tags'));
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'salary' => $request->salary,
                'vacancy' => $request->vacancy,
                'category_id' => $request->category,
                'location_id' => $request->location,
                'tag' => $request->tags,
                'availability' => $request->availability,
                'image' => $filename,
            ];
        }
        // print_r($data);
        // $model = new Job;
        if (Job::create($data)) {
            $request->photo->move('uploads', $filename);
            return redirect('all-job')->with('msg', 'Job Successfully Post');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jid)
    {
        $data['single'] = Job::find($jid);
        $data['categories'] = Category::all();
        $data['locations'] = Location::all();
        return view('backend.jobs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jid)
    {
        $job = Job::find($jid);
        $filename = time() . '.' . $request->photo->extension();
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'vacancy' => $request->vacancy,
            'category_id' => $request->category,
            'location_id' => $request->location,
            'tag' => $request->tags,
            'availability' => $request->availability,
            'image' => $filename,
        ];
        $job->update($data);
        $request->photo->move('uploads', $filename);
        return redirect('all-job')->with('msg', 'Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jid)
    {
        $job = Job::find($jid);
        $job->delete($jid);
        return redirect('all-job')->with('msg', 'Successfully Deleted');
    }
}
