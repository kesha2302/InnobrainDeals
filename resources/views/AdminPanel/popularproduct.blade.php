@extends('AdminPanel.layout.main')

@section('main-container')
    <div class='mt-2 container'>
        <h3>Popular Products</h3>
        <hr>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h4 class="fw-light mr-auto">Add Popular Products</h4>
                <div class="d-flex">
                    <button type="button" onclick="window.location='{{ url('/Adminpopularproductform') }}'" class="btn btn-dark btn-circle font-rights">
                        <i class="bi bi-plus"></i> Add
                    </button>
                </div>
            </div>
        </nav>

        <div class="card mt-2" style="width:60rem;">
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%;">No.</th>
                                <th style="width: 10%;">Product Name</th>
                                <th style="width: 10%;">Created_at</th>
                                <th style="width: 10%;">Updated_at</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($popularProducts as $product)
                                <tr>
                                    <td>{{ $product->popularproduct_id }}</td>
                                    <td>{{ $product->product->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a href="{{route('pp.delete',['id'=>$product->popularproduct_id])}}">
                                            <button class="btn btn-danger">Delete</button>

                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
