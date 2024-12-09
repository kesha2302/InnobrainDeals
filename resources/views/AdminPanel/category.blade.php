@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Categories</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by name" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Admincategory')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>
            <div class="d-flex">
                <button type="button" onclick="window.location='{{ url('/Admincategoryform') }}'" class="btn btn-dark btn-circle font-rights me-2">
                    <i class="bi bi-plus"></i> Add
                </button>
                <a href="{{ url('/Admincategorytrash') }}">
                    <button class="btn btn-danger ml-2">
                        Trashed Data
                    </button>
                </a>
            </div>
        </div>
    </nav>


    <div class="card mt-2" style="width: 100%; overflow-x: auto;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Category Id</th>
                            <th style="width: 15%;">Name</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->category_id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>

                                <td>
                                <a href="{{route('category.edit',['id'=>$category->category_id])}} ">
                                  <button style="margin-right:10px;" class="btn btn-primary">Update</button>
                                </a>

                                    <a href="{{route('category.delete',['id'=>$category->category_id])}}">
                                    <button class="btn btn-danger">Delete</button>
                                    </a>
                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   </div>
@endsection
