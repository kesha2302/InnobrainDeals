@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Categories Trash  Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">

                <a href="{{ url('/Admincategory') }}">
                    <button class="btn btn-dark ml-2">
                        View Categories Detail</button>
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
                                    <a href="{{route('category.forcedelete',['id'=>$category->category_id])}}">
                                        <button style="margin-right:10px;" class="btn btn-danger">Delete</button>
                                        </a>

                                        <a href="{{route('category.restore',['id'=>$category->category_id])}}">
                                          <button class="btn btn-primary">Restore</button>
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
