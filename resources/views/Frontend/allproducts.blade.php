<section class="bg-light">
    <div class="container py-5">
        @foreach($categories as $category)
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><b>{{ $category->name }}</b></h1>
                {{-- <p>
                    Antivirus software (abbreviated to AV software), also known as anti-malware, is
                    a computer program used to prevent, detect, and remove malware.
                </p> --}}
            </div>
        </div>
        <div class="row">
            @foreach($category->products as $product)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="{{ asset('productsimg/' . $product->image) }}"
                        alt="{{ $product->name }}" class="card-img-top"
                        style=" width: 100%; height: 250px;">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            {{-- <li class="text-muted text-right">$240.00</li> --}}
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark"><b>{{ $product->name }}</b></a>
                        <p class="card-text">
                            {{ $product->description }}
                        </p>
                        <p class="card-text">MRP: ₹{{ number_format($product->price, 2) }}</p>
                        @if($product->discount_price>1)
                        <p class="card-text">Discount: ₹{{$product->discount_price}}</p>
                        @endif

                        <div class="mt-4">
                            <button onclick="addToCart({{ $product->product_id }})" class="btn btn-lg btn-dark" style="background-color: #000000; border:none; margin-top: 20px; color:#eee;">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>

<script>
     function addToCart(productId) {
        // Check if user is logged in

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
