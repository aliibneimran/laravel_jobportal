<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['categories'] = Category::all();
        $data['jobs'] = Job::all();
        return view('backend.jobs.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('backend.jobs.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hobbies = implode(",", $request->get('hobbies'));
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'category_id' => $request->category,
            'hobbies' => $hobbies,
            'radio'=> $request->gender,
        ];
        // print_r($data);
        // $model = new Job;
        if(Job::insert($data)){
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
        return view('backend.jobs.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$jid)
    {
        $job = Job::find($jid);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'salary' => $request->salary,
            'category_id' => $request->category,
        ];
        $job->update($data);
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
