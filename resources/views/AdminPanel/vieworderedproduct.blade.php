@extends('AdminPanel.layout.main')

@section('main-container')
<div class="mt-3 container">
    <h3>Order Details</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="ms-auto d-flex">
                <button type="button" onclick="window.location='{{ url('/Adminorder') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    <i class="bi bi-plus"></i> Back
                </button>
            </div>
        </div>
    </nav>

    <div class="card mt-2">
        <div class="card-body">
            <h5>Customer Details:</h5>
            <p><strong>Name:</strong> {{ $order->customer->fullname }}</p>
            <p><strong>Email:</strong> {{ $order->customer->email }}</p>

            <h5>Order Details:</h5>
            <p><strong>Order ID:</strong> {{ $order->order_id }}</p>
            <p><strong>Total Cost:</strong> ₹{{ $order->total_cost }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at }}</p>

            <h5>Products:</h5>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>₹{{ $product['price'] }}</td>
                            {{-- <td>
                                <a class="btn btn-primary"
                                href="{{ route('send.activation', ['orderId' => $order->order_id, 'productId' => $product['id']]) }}"
                                role="button">Send Activation Link</a>
                            </td> --}}

                            <td>
                                @if ($product['status'] === 'Activated')
                                    <button class="btn btn-primary" disabled>Send Activation Link</button>
                                @else
                                    <a class="btn btn-primary"
                                       href="{{ route('send.activation', ['orderId' => $order->order_id, 'productId' => $product['id']]) }}"
                                       role="button">
                                       Send Activation Link
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if ($product['status'] === 'Activated')
                                    <span class="badge text-bg-success">Activated</span>
                                @else
                                    <span class="badge text-bg-primary">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
