<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index(){
        $data['jobs'] = Job::all();
        $data['industries'] = Industry::all();
        $data['locations'] = Location::all();
        $data['categories'] = Category::all();
        return view('frontend/jobsList',$data);
    }

    public function cart()
    {
        return view('frontend.cart');
    }
    public function addToCart($id)
    {
        $jobs = Job::findOrFail($id);
        $cart = session()->get('cart', []); 

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $jobs->title,
                "quantity" => 1,
                "salary" => $jobs->salary,
                "image" => $jobs->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'jobs added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'jobs removed successfully');
        }
    }
}
