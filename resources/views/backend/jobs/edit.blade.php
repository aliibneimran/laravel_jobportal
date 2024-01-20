@extends('backend.layouts.app')

@section('title','Post A Job')

@section('content')
<div class="box-heading">
    <div class="box-title">
        <h3 class="mb-35">Post a Job</h3>
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
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="{{ route('jobs.update', $single->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-30">
                                            <label class="font-sm color-text-mutted mb-10">Job location</label>
                                            <input class="form-control" type="text" placeholder="e.g. &quot;New York City&quot; or &quot;San Francisco”">
                                        </div>
                                    </div> -->
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Workplace type *</label>
                                                <select class="form-control" name="category">
                                                    <option value="">Select</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" {{old('category')==$cat->id?'selected':''}}>{{$cat->name}}</option>
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
                                            <label class="form-label">Tags:</label>

                                            <div class="form-check  mb-1">
                                                <input type="checkbox" name="tags[]" id="" value="Laravel" {{in_array('Laravel',old('tags',[]))?'checked':''}} data-parsley-mincheck="2" class="form-check-input" />
                                                <label for="hobby1" class="form-check-label"> Laravel</label>
                                            </div>
                                            <div class="form-check  mb-1">
                                                <input type="checkbox" name="tags[]" id="" value="React" {{in_array('React',old('tags',[]))?'checked':''}} class="form-check-input" />
                                                <label for="hobby2" class="form-check-label"> React </label>
                                            </div>
                                            <div class="form-check ">
                                                <input type="checkbox" name="tags[]" id="" value="Vue" {{in_array('Vue',old('tags',[]))?'checked':''}} class="form-check-input" />
                                                <label for="hobby3" class="form-check-label"> Vue </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tags:</label>

                                            @foreach(['Laravel', 'React', 'Vue','Angular'] as $tag)
                                            <div class="form-check mb-1">
                                                <input type="checkbox" name="tags[]" id="{{ $tag }}" value="{{ $tag }}" {{ in_array($tag, old('tags', [])) ? 'checked' : '' }} class="form-check-input" />
                                                <label for="{{ $tag }}" class="form-check-label">{{ $tag }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Location *</label>
                                                <select class="form-control" name="location">
                                                    <option value="">Select</option>
                                                    @foreach($locations as $item)
                                                    <option value="{{$item->id}}" {{old('location')==$item->id?'selected':''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Avaiability *:</label>

                                            <div class="form-check mb-1">
                                                <input type="radio" name="availability" value="1" {{old('availability')?'checked':''}} class="form-check-input">
                                                <label for="genderM" class="form-check-label">Available</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="availability" value="0" {{old('availability')?'':'checked'}} class="form-check-input">
                                                <label for="genderF" class="form-check-label">Not Available</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <div class="box-upload">
                                                    <input class="fileupload" type="file" name="photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mt-10">
                                                <button class="btn btn-default btn-brand icon-tick" type="submit">Post New Job</button>
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