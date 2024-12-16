@extends('AdminPanel.layout.main')

@section('main-container')
<div class="container mt-4">
    <h3>Send Activation Link</h3>
    <hr>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="ms-auto d-flex">
                <button type="button" onclick="window.location='{{ url('/Admin_guestorders') }}'" class="btn btn-dark btn-circle font-rights me-md-2">
                    <i class="bi bi-plus"></i> Back
                </button>
            </div>
        </div>
    </nav>

    <div class="card mb-3">
        <div class="card-body">
            <h5>Product Details</h5>
            <p><strong>Product Name:</strong> {{ $product->name }}</p>
            <p><strong>Price:</strong> ₹{{ $product->price }}</p>
        </div>
    </div>

    <div class="card mb-3">
    <div class="card-body">

        <form action="{{route('send.guestactivationlink')}}" method="POST">
        @csrf

        <input type="hidden" name="order_id" value="{{ $order->guestorder_id }}">
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">

        <div class="mb-3">
            <label for="email" class="form-label">Customer Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $guser->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your activation message here..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Activation Link</button>
    </form>
</div>
</div>

</div>
@endsection
