@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Aboutus Trash  Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="d-flex">

                <a href="{{ url('/Adminaboutus') }}">
                    <button class="btn btn-dark ml-2">
                        View Aboutus Details</button>
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
                            <th style="width: 10%;">Aboutus Id</th>
                            <th style="width: 15%;">Title</th>
                            <th style="width: 40%;">Description 1</th>
                            <th style="width: 40%;">Description 2</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aboutus as $ab)
                        <tr>
                            <td>{{$ab->aboutus_id}}</td>
                            <td>{{$ab->title}}</td>
                            <td>
                                <div style="width: 300px; height: 150px; overflow: hidden; text-overflow: ellipsis; white-space: normal; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">
                                    {{$ab->description1}}
                                </div>
                            </td>
                            <td>

                                <div style="width: 300px; height: 150px; overflow: hidden; text-overflow: ellipsis; white-space: normal; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">
                                    {{$ab->description2}}
                                </div>
                            </td>
                            <td>{{$ab->created_at}}</td>
                            <td>{{$ab->updated_at}}</td>
                            <td>
                                <a href="{{route('aboutus.forcedelete',['id'=>$ab->aboutus_id])}}">
                                <button class="btn btn-danger">Delete</button>
                                </a>
                                </td>
                                <td>
                                <a href="{{route('aboutus.restore',['id'=>$ab->aboutus_id])}}">
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
