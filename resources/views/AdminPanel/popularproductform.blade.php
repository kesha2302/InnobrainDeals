@extends('AdminPanel.layout.main')

@section('main-container')

    <div class="card  mt-3 mx-auto" style="width:50rem;">

        <div class="card-header mt-2">
            <h3>Select Popular Products</h3>
        </div>


        <div class="card-body">
            <form action="{{ url('/') }}/Adminpopularproductform2" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">ProductName:</label>
                    <select name="products[]" class="form-select" data-live-search="true" aria-label="Default select example"
                        multiple="multiple">
                        <option selected disabled>Select a Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>


@endsection
