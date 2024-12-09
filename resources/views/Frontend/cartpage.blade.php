
@extends('Frontend.Layout.main')

@section('main-container')
<h2 style="text-align: center; font-size: 32px; color: #333; margin-bottom: 20px; margin-top:30px;">Cart Page</h2>

<div style="margin: 50px auto; max-width: 900px; background-color: #f5f5f5; padding: 30px; border-radius: 8px;">
    <!-- Cart Page Title -->
    @foreach ($cart as $item)
    <!-- Product Card -->
    <div style="background-color: white; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin-bottom: 20px;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <!-- Product Image -->
            <div style="flex-basis: 20%; text-align: center;">
                <img src="{{ asset('productsimg/' . $item['image']) }}" alt="Product Image" style="width: 100px; border-radius: 5px;" />
            </div>

            <!-- Product Details -->
            <div style="flex-basis: 60%; padding-left: 20px;">
                <p style="font-size: 18px; margin: 0;">Name: {{ $item['name'] }}</p>
                {{-- <p style="font-size: 18px; margin: 0;">Quantity: {{ $item['quantity'] }}</p> --}}
                <p style="font-size: 16px; margin: 5px 0;">MRP Price: ₹{{ $item['price'] }}</p>
                @if(isset($item['discount_price']) && $item['discount_price'] > 1)
    <p style="font-size: 16px; margin: 5px 0;">Discount Price: ₹{{ $item['discount_price'] }}</p>
@endif
            </div>


            <div style="flex-basis: 20%; text-align: right;">
                <button onclick="removeFromCart('{{ $item['product_id'] }}')" style="background-color: rgb(222, 68, 68); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                    <i class="fa fa-fw fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Total Cost and Checkout -->
    <div style="display: flex; justify-content: space-between; align-items: center; background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <!-- Total Cost -->
        <div>
            <p style="font-size: 18px; font-weight: bold; margin: 0;">Total Cost:</p>
            <p id="totalAmount" style="font-size: 20px; color: #000; margin: 0;">₹{{ session('totalAmount', 0) }}</p>
        </div>

        <!-- Checkout Button -->
        {{-- <div>
            <a href="{{ url('/checkoutpage') }}" style="background-color:green; color: white; border: none; padding: 15px 30px; text-decoration:none; font-size: 18px; border-radius: 5px; cursor: pointer;">Checkout</a>
        </div> --}}
        <div>
            <button id="checkoutButton" style="background-color: green; color: white; border: none; padding: 15px 30px; font-size: 18px; border-radius: 5px; cursor: pointer;">Checkout</button>
        </div>
    </div>

    <!-- Back Button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{url('/')}}">
        <button style="background-color: #000; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Back</button>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function removeFromCart(productId) {
        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                location.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }



    $(document).ready(function() {
        var totalAmount = {{ session('totalAmount', 0) }};
        var checkoutButton = $('#checkoutButton');


        if (totalAmount <= 0) {
            checkoutButton.prop('disabled', true);
            checkoutButton.css('background-color', 'grey');
        }

        checkoutButton.click(function() {
            if (totalAmount > 0) {
                window.location.href = '{{ url("/checkoutpage") }}';
            }
        });
    });




</script>
@endsection
