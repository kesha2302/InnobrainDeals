@extends('Frontend.Layout.main')

@section('main-container')

<div class="container" style="margin-bottom: 20px;">
    <h1 style="margin-bottom: 20px;">{{ $categories->name }}</h1>
    <div class="row">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100" style="border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <img src="{{ asset('productsimg/' . $product->image) }}" alt="{{ $product->name }}"
                            class="card-img-top"
                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px 10px 10px 10px; margin: 10px auto; display: block; margin-top:20px;">
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 1.1rem;">{{ $product->name }}</h5>
                            <p class="card-text" style="font-size: 13px;">
                                {{ $product->description }}
                            </p>
                            <p class="card-text" style="font-size: 13px;">MRP: ₹{{ number_format($product->price, 2) }}</p>
                            @if($product->discount_price > 1)
                            <p class="card-text" style="font-size: 13px;">Discount: ₹{{$product->discount_price}}</p>
                            @endif

                            <button onclick="addToCart({{ $product->product_id }})" class="btn btn-dark"
                                style="background-color: #000000; border:none; font-size: 14px; padding: 8px 16px;">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No products found in this category.</p>
        @endif
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function addToCart(productId) {
        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('.position-absolute.top-0.left-100.translate-middle.badge').text(response.totalItems);
                alert(response.message);
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }
</script>

@endsection
