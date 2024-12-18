@extends('Frontend.Layout.main')

@section('main-container')

<div class="container mt-4">
    <h2 class="text-center">Checkout Page</h2>

    <section style="background-color: #eee;">
        <div class="container h-100 py-5 mb-4">
            <div class="row d-flex justify-content-center align-items-center h-100 bg-light ">
                <div class="col-10">
                    <h5>Total Cost: ₹{{ session('totalAmount') }}</h5>
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-12">
                                    <h4 class="text-primary">Basic Information</h4>
                                    <hr>

                                        <form id="bookdetail" method="POST" action="{{ route('checkout.submit') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label>Full Name:</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" onchange="submitForm()" required/>
                                            </div>
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="col-md-12 mb-3">
                                                <label>Email Address:</label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" onchange="submitForm()" required/>
                                            </div>
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="col-md-12 mb-3">
                                                <label>Contact Number:</label>
                                                <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="Enter Phone Number" onchange="submitForm()" required/>
                                            </div>
                                            @error('contact_number')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container text-center mx-auto">
                        <div class="d-flex justify-content-center">

                            <div id="razorpay-button-container" style="display:none;">
                            <form action="/handlepayment" method="post" id="razorpayForm" >
                                @csrf
                                <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount="{{ session('totalAmount') * 100 }}"
                                    data-currency="INR"
                                    data-buttontext="Pay"
                                    data-description="Test transaction"
                                    data-theme.color="#0000FF"
                                    id="razorpay-button"
                                    ></script>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

    function submitForm() {
        var form = document.getElementById('bookdetail');
        var formData = new FormData(form);

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var contact_number = document.getElementById('contact_number').value;

        if (name && email && contact_number) {
            // Show Razorpay button if all fields are filled
            document.getElementById('razorpay-button-container').style.display = 'block';
        } else {
            // Hide Razorpay button if any field is empty
            document.getElementById('razorpay-button-container').style.display = 'none';
        }

        // Send form data using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    // Handle response here
                    console.log(response.message);
                } else {
                    // Handle error here
                    console.log('An error occurred while placing the order. Please try again.');
                }
            }
        };
        xhr.open('POST', form.action);
        xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
        xhr.send(formData);
    }

</script>


@endsection

