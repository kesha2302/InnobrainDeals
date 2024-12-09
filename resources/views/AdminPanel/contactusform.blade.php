@extends('AdminPanel.layout.main')

@section('main-container')
<div class="card  mt-3 mx-auto" style="width:50rem; height:28rem;">

    <div class="card-header mt-2">
        <h3>{{$title}}</h3>
    </div>

        <div class="card-body">

                <form action="{{$url}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{$contact->email}}"/>
                    @error('email')
                     <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact 1:</label>
                    <input type="text" name="contact1" class="form-control" value="{{$contact->contact1}}"/>
                    @error('contact1')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact 2:</label>
                    <input type="text" name="contact2" class="form-control" value="{{$contact->contact2}}"/>
                    @error('contact2')
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
