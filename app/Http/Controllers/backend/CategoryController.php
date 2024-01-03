<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('backend/categories');
    }
    public function add(){
        return view('backend/addCategory');
    }
}
