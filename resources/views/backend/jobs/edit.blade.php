@extends('backend.layouts.app')

@section('title','Post A Job')

@section('content')
<div class="box-heading">
    <div class="box-title">
        <h3 class="mb-35">Edit a Job</h3>
    </div>
    <div class="box-breadcrumb">
        <div class="breadcrumbs">
            <ul>
                <li> <a class="icon-home" href="index.html">Admin</a></li>
                <li><span>Post New Job</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="section-box">
            <div class="container">
                <div class="panel-white mb-30">
                    <div class="box-padding bg-postjob">
                        <h5 class="icon-edu">Tell us about your role</h5>
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="row">
                                    <form action="{{ route('jobs.update', $single->id) }}" method="POST">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Job title *</label>
                                                <input class="form-control" type="text" placeholder="e.g. Senior Product Designer" name="title" value="{{old('name')?old('name'):$single->title}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Add your job description *</label>
                                                <textarea class="form-control" name="description" rows="8">{{old('name')?old('name'):$single->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Workplace type *</label>
                                                <select class="form-control" name="category">
                                                    <option value="">Select</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" {{ old('category') == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Salary</label>
                                                <input class="form-control" type="text" placeholder="$2200 - $2500" name="salary" value="{{old('name')?old('name'):$single->salary}}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Hobbies (Optional, but 2 minimum):</label>

                                            <div class="form-check  mb-1">
                                                <input type="checkbox" name="hobbies[]" id="hobby1" value="Skiing" data-parsley-mincheck="2" class="form-check-input" />
                                                <label for="hobby1" class="form-check-label"> Skiing </label>
                                            </div>
                                            <div class="form-check  mb-1">
                                                <input type="checkbox" name="hobbies[]" id="hobby2" value="Running" class="form-check-input" />
                                                <label for="hobby2" class="form-check-label"> Running </label>
                                            </div>
                                            <div class="form-check ">
                                                <input type="checkbox" name="hobbies[]" id="hobby3" value="Eating" class="form-check-input" />
                                                <label for="hobby3" class="form-check-label"> Eating </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gender *:</label>

                                            <div class="form-check mb-1">
                                                <input type="radio" name="gender" id="genderM" value="Male" required=" " class="form-check-input">
                                                <label for="genderM" class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="gender" id="genderF" value="Female" class="form-check-input">
                                                <label for="genderF" class="form-check-label">Female</label>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Job location</label>
                                            <input class="form-control" type="text" placeholder="e.g. &quot;New York City&quot; or &quot;San Francisco”">
                                        </div>
                                    </div> -->
                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Tags (optional) </label>
                                            <input class="form-control" type="text" placeholder="Figma, UI/UX, Sketch...">
                                        </div>
                                    </div> -->
                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <div class="box-upload">
                                                <div class="add-file-upload">
                                                    <input class="fileupload" type="file" name="file">
                                                </div><a class="btn btn-default">Upload File</a>
                                            </div>
                                        </div>
                                    </div> -->
                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30 box-file-uploaded d-flex align-items-center"><span>Job_required.pdf</span><a class="btn btn-delete">Delete</a></div>
                                    </div> -->
                                        <div class="col-lg-12">
                                            <div class="form-group mt-10">
                                                <button class="btn btn-default btn-brand icon-tick" type="submit">Update Job</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection