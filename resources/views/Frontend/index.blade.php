@extends('Frontend.layout.main')
@section('main-container')
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<!-- Start Banner Hero -->
@php
$banners = \App\Models\Banner::all();
@endphp

@include('Frontend.banner')
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Watch premium OTT apps</h1>
            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 p-5 mt-3">
            <a href="#"><img src="https://static1.howtogeekimages.com/wordpress/wp-content/uploads/2023/08/netflix.jpg?q=70&fit=crop&w=1100&h=618&dpr=1" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Netflix</h5>
            <p class="text-center"><a class="btn btn-dark">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-3 p-5 mt-3">
            <a href="#"><img src="data:image/png;base64,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" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Zee 5</h2>
            <p class="text-center"><a class="btn btn-dark">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-3 p-5 mt-3">
            <a href="#"><img src="https://logos-world.net/wp-content/uploads/2020/11/Jio-Emblem.png" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Jio</h2>
            <p class="text-center"><a class="btn btn-dark">Go Shop</a></p>
        </div>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->

{{-- All Products --}}

@php
$products = \App\Models\Product::all();
@endphp

@php
$categories = \App\Models\Category::all();
@endphp

{{-- All Products --}}
@include('Frontend.allproducts')

<!-- End Featured Product -->

	@endsection
