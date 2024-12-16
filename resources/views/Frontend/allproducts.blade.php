<section class="bg-light">
    <div class="container py-5">
        @foreach($categories as $category)
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><b>{{ $category->name }}</b></h1>
            </div>
        </div>
        <div class="row">
            @foreach($category->products as $product)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100" style="width: 90%; margin: 0 auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <a href="shop-single.html">
                        <img src="{{ asset('productsimg/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="card-img-top"
                            style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px 10px 0 0;">
                    </a>
                    <div class="card-body" style="padding: 15px; font-size: 14px;">
                        {{-- <ul class="list-unstyled d-flex justify-content-between" style="font-size: 12px;">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                        </ul> --}}
                        <a href="#" class="h2 text-decoration-none text-dark" style="font-size: 16px;"><b>{{ $product->name }}</b></a>
                        <p class="card-text" style="font-size: 13px;">
                            {{ $product->description }}
                        </p>
                        <p class="card-text" style="font-size: 13px;">MRP: ₹{{ number_format($product->price, 2) }}</p>
                        @if($product->discount_price > 1)
                        <p class="card-text" style="font-size: 13px;">Discount: ₹{{$product->discount_price}}</p>
                        @endif

                        <div class="mt-3">
                            <button onclick="addToCart({{ $product->product_id }})" class="btn btn-dark" style="background-color: #000000; border:none; font-size: 14px; padding: 8px 16px;">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
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
                // $('.position-absolute.top-0.left-100.translate-middle.badge').text(response.totalItems);
                const badge = $('.navicon .badge');
    if (badge.length > 0) {
        badge.text(response.totalItems);
    } else {

        $('.navicon').append(
            `<span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">${response.totalItems}</span>`
        );
    }
                alert(response.message);
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }
</script>
