@extends('backend.layouts.app')

@section('title','Categories')

@section('content')
<div><a href="{{URL('catagories/create')}}" class="btn btn-primary">Add Category</a></div>
<h4>All Categories</h4>
<div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead >
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach($categories as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{URL('catagories/edit/$item->id')}}" class="m-2"><i class="fas fa-pen-to-square"></i></a>
                    <a href="{{URL('catagories/delete')}}" ><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection