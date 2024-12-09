@extends('AdminPanel.layout.main')

@section('main-container')
<div class='mt-3 container'>
    <h3>Guest guestorderss</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <form class="d-flex" action="">
                <input class="form-control me-5 mr-sm-2" type="search" value="{{$search}}" name="search"
                placeholder="Search by ordersid" aria-label="Search" style="width: 500px;">
                <button class="btn btn-dark">Search</button>
                <span style="margin-left: 10px;">
                    <a href="{{url('/Admin_guestguestorderss')}}">
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
                            <th style="width: 10%;">Orders Id</th>
                            <th style="width: 10%;">Product Ids</th>
                            <th style="width: 10%;">Product Names</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 10%;">Total Cost</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guestorders as $guestorders )
                        <tr>
                            <td>{{$guestorders->guestorder_id}}</td>
                            <td>
                                <ul>
                                    @php
                                        $Productids = explode(',', $guestorders->product_ids);
                                    @endphp
                                    @foreach ($Productids as $ids)
                                        <li>{{ $ids }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php
                                        $Productnames = explode(',', $guestorders->product_name);
                                    @endphp
                                    @foreach ($Productnames as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php
                                        $Prices = explode(',', $guestorders->price);
                                    @endphp
                                    @foreach ($Prices as $price)
                                        <li>₹{{ $price }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>₹{{$guestorders->total_cost}}</td>
                            <td>{{$guestorders->created_at}}</td>
                            <td>{{$guestorders->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   </div>
@endsection
