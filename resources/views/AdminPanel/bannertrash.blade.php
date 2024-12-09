@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Banner Trash Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">

                <a href="{{ url('/Adminbannerdetail') }}">
                    <button class="btn btn-dark ml-2">
                        View Banner Details</button>
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
                            <td>{{$bd->description ?: '-'}}</td>
                            <td>{{$bd->created_at}}</td>
                            <td>{{$bd->updated_at}}</td>
                            <td>
                                <a href="{{route('bannerdetail.forcedelete',['id'=>$bd->banner_id])}}">
                                <button class="btn btn-danger">Delete</button>
                                </a>
                                </td>
                                <td>
                                <a href="{{route('bannerdetail.restore',['id'=>$bd->banner_id])}}">
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
