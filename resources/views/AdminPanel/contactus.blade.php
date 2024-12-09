@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Contact Us Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="ms-auto d-flex">
                <button type="button" onclick="window.location='{{ url('/Admincontactform') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    <i class="bi bi-plus"></i> Add
                </button>
            </div>
        </div>
    </nav>


    <div class="card mt-2" style="width:65rem;">
        <div class="card-body">
            <div class="table-responsive text-center ">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Contact Id</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 20%;">Contact 1</th>
                            <th style="width: 20%;">Contact 2</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contact as $contact )
                        <tr>
                            <td>{{ $contact->contactus_id}}</td>
                            <td>{{ $contact->email}}</td>
                            <td>+91 {{ $contact->contact1}}</td>
                            <td>+91 {{ $contact->contact2}}</td>
                            <td>{{ $contact->created_at}}</td>
                            <td>{{ $contact->updated_at}}</td>
                            <td>
                                <a href="{{route('contact.edit',['id'=>$contact->contactus_id])}} ">
                                  <button class="btn btn-primary">Update</button>
                                </a>
                                </td>
                                <td>
                                    <a href="{{route('contact.delete',['id'=>$contact->contactus_id])}}">
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
