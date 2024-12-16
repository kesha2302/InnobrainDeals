@extends('AdminPanel.layout.main')

@section('main-container')

@if (session('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class='mt-3 container'>
    <h3>Cartsession Data</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="ms-auto d-flex">
                <form action="{{ route('admin.cartsessions.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all records?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark btn-circle font-rights me-md-2">
                        <i class="bi bi-plus"></i> Delete
                    </button>
                </form>

            </div>
        </div>
    </nav>


    <div class="card mt-2" style="width:65rem;">
        <div class="card-body">
            <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Id</th>
                            <th style="width: 10%;">Customer</th>
                            <th style="width: 10%;">Product Ids</th>
                            <th style="width: 10%;">Product Names</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 10%;">Discount Price</th>
                            <th style="width: 10%;">Created At</th>
                            <th style="width: 10%;">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartsession as $cs )
                        <tr>
                            <td>{{$cs->cartsession_id}}</td>
                            <td>{{$cs->customer->fullname}}</td>
                            <td>
                                <ul>
                                    @php
                                        $Productids = explode(',', $cs->product_ids);
                                    @endphp
                                    @foreach ($Productids as $ids)
                                        <li>{{ $ids }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php
                                        $Productnames = explode(',', $cs->name);
                                    @endphp
                                    @foreach ($Productnames as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php
                                        $Prices = explode(',', $cs->price);
                                    @endphp
                                    @foreach ($Prices as $price)
                                        <li>₹{{ $price }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php
                                        $DPrices = explode(',', $cs->discount_price);
                                    @endphp
                                    @foreach ($DPrices as $price)
                                        <li>₹{{ $price }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$cs->created_at}}</td>
                            <td>{{$cs->updated_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   </div>
@endsection
