@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Guestuser And Payment Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by orderid" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Admin_guestuserdetail')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>

        </div>
    </nav>


    <div class="card mt-2" style="width:65rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">No.</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 10%;">Order Id</th>
                            <th style="width: 10%;">Payment Id</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">Contact</th>
                            <th style="width: 10%;">Total Cost</th>
                            <th style="width: 10%;">Register Time</th>
                            <th style="width: 10%;">Updated Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guestuser as $guestuser )
                        <tr>
                            <td>{{$guestuser->guest_id}}</td>
                            <td>{{$guestuser->name}}</td>
                            <td>{{$guestuser->guestorder_id}}</td>
                            <td>{{$guestuser->payment_id}}</td>
                            <td>{{$guestuser->email}}</td>
                            <td>{{$guestuser->contact}}</td>
                            <td>₹{{$guestuser->total_cost}}</td>
                            <td>{{$guestuser->created_at}}</td>
                            <td>{{$guestuser->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   </div>
@endsection
