<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('backend.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = ['name'=> $request->name];
        if(Category::insert($data)){
          return redirect('categories')->with('msg','Successfully Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cid)
    {
        $category = Category::find($cid);
        $data['single'] = $category;
        return view('backend.categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$cid)
    {
        $category = Category::find($cid);
        $data = ['name' => $request->name];
        $category->update($data);
        return redirect('categories')->with('msg', 'Successfully Update'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cid)
    {
        $category = Category::find($cid);
        $category->delete($cid);
        return redirect('catagories')->with('msg', 'Successfully Deleted'); 

    }
}
