@extends('AdminPanel.layout.main')

@section('main-container')
<div class="card  mt-5 mx-auto shadow-lg" style="width:50rem;">

    <div class="card-header mt-2">
        <h3>{{$title}}</h3>
    </div>


        <div class="card-body">

                <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3" >
                    <label class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{$aboutus->title}}"/>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description1:</label>
                    <input type="text" name="description1" class="form-control" value="{{$aboutus->description1}}"/>
                    @error('description1')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description2:</label>
                    <input type="text" name="description2" class="form-control" value="{{$aboutus->description2}}"/>
                    @error('description2')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
            </form>
        </div>


</div>
@endsection
