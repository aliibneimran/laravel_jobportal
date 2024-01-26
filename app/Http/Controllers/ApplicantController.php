<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $data['applicants'] = Candidate::all();
        return view('backend.applicants',$data);
    }
}
