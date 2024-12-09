@extends('AdminPanel.layout.main')

@section('main-container')
<div class="card  mt-3 mx-auto" style="width:50rem; height:20rem;">

    <div class="card-header mt-2">
        <h3>{{$title}}</h3>
    </div>

        <div class="card-body">

                <form action="{{$url}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
                    @error('name')
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
