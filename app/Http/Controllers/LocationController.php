<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $data['location'] = Location::all();
        return view('backend.locations.index',$data);
    }
    public function create()
    {
        return view('backend.locations.create');
    }
    public function store(Request $request)
    {
        $data = ['name'=> $request->name];
        if(Location::insert($data)){
          return redirect('locations')->with('msg','Successfully Added');
        }
    }
    public function edit($cid)
    {
        $Location = Location::find($cid);
        $data['single'] = $Location;
        return view('backend.locations.edit',$data);
    }
    public function update(Request $request,$cid)
    {
        $Location = Location::find($cid);
        $data = ['name' => $request->name];
        $Location->update($data);
        return redirect('locations')->with('msg', 'Successfully Update'); 

    }
    public function destroy($cid)
    {
        $Location = Location::find($cid);
        $Location->delete($cid);
        return redirect('locations')->with('msg', 'Successfully Deleted'); 

    }
}
