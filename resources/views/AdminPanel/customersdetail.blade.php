@extends('AdminPanel.layout.main')

@section('main-container')
<h3 class='m-2'>Customers Detail</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" value="{{$search}}" type="search"  name="search"
                placeholder="Search by name" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Admin_customersdetail')}}">
                        <button class="btn btn-dark" type="button">Reset</button>
                    </a>
                </span>
            </form>

        </div>
    </nav>


    <div class="card mt-2" style="width:62rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Customer Id</th>
                            <th style="width: 15%;">Name</th>
                            <th style="width: 20%;">Email</th>
                            <th style="width: 20%;">Contact</th>
                            <th style="width: 20%;">Address</th>
                            <th style="width: 20%;">State</th>
                            <th style="width: 20%;">City</th>
                            <th style="width: 20%;">Pincode</th>
                            <th style="width: 10%;">Register Time</th>
                            <th style="width: 10%;">Updated Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $customer )
                        <tr>
                            <td>{{$customer->customer_id}}</td>
                            <td>{{$customer->fullname}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->contact}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->state}}</td>
                            <td>{{$customer->city}}</td>
                            <td>{{$customer->pincode}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>{{$customer->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   </div>
@endsection
