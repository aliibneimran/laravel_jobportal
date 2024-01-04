@extends('backend.layouts.app')

@section('title','Add Category')

@section('content')
<form action="" method="POST">
@csrf
    <label for="" class="p-2">Category Name</label>
    <input type="text" name="name"><br><br>
    <a href="" class="btn btn-success">Add</a>
</form>
@endsection