@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Banner Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by title" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Adminbannerdetail')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>
            <div class="d-flex">
                <button type="button" onclick="window.location='{{ url('/Adminbannerdetailform') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    <i class="bi bi-plus"></i> Add
                </button>
                <a href="{{ url('/Adminbannerdetailtrash') }}">
                    <button class="btn btn-danger ml-2" >
                        Trashed Data</button>
                </a>
            </div>
        </div>
    </nav>


    <div class="card mt-2" style="width:60rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Banner Id</th>
                            <th style="width: 40%;">Image</th>
                            <th style="width: 15%;">Title</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannerdetail as $bd )
                        <tr>
                            <td>{{$bd->banner_id}}</td>
                            <td><img src="{{asset('BannerImage/'.$bd->image)}}" class="img-fluid rounded"
                                alt="Image" style="width: 600px; height:70px;"></td>
                            <td>{{$bd->title ?: '-'}}</td>
                            <td >{{$bd->description ?: '-'}}</td>
                            <td>{{$bd->created_at}}</td>
                            <td>{{$bd->updated_at}}</td>
                            <td>
                                <a href="{{route('bannerdetail.delete',['id'=>$bd->banner_id])}}">
                                <button class="btn btn-danger">Trash</button>
                                </a>
                                </td>
                                <td>
                                <a href="{{route('bannerdetail.edit',['id'=>$bd->banner_id])}}">
                                  <button class="btn btn-primary">Update</button>
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
