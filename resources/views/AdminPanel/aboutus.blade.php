@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>About Us Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by title" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Adminaboutus')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>
            <div class="d-flex">
                <button type="button" onclick="window.location='{{ url('/Adminaboutusform') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    <i class="bi bi-plus"></i> Add
                </button>
                <a href="{{ url('/Adminaboutustrash') }}">
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
                <table class="table" style="min-width: 1000px;">
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
                                <a href="{{route('aboutus.delete',['id'=>$ab->aboutus_id])}}">
                                    <button class="btn btn-danger">Trash</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('aboutus.edit',['id'=>$ab->aboutus_id])}}">
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
