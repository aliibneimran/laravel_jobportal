<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $data['industries'] = Industry::all();
        return view('backend.industries.index',$data);
    }
    public function create()
    {
        return view('backend.industries.create');
    }
    public function store(Request $request)
    {
        $data = ['name'=> $request->name];
        if(Industry::insert($data)){
          return redirect('industries')->with('msg','Successfully Added');
        }
    }
    public function edit($cid)
    {
        $Industry = Industry::find($cid);
        $data['single'] = $Industry;
        return view('backend.industries.edit',$data);
    }
    public function update(Request $request,$cid)
    {
        $Industry = Industry::find($cid);
        $data = ['name' => $request->name];
        $Industry->update($data);
        return redirect('industries')->with('msg', 'Successfully Update'); 

    }
    public function destroy($cid)
    {
        $Industry = Industry::find($cid);
        $Industry->delete($cid);
        return redirect('industries')->with('msg', 'Successfully Deleted'); 

    }
}
