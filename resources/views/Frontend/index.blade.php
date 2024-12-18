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


{{-- Popular Products --}}
@php
$popularproducts = \App\Models\PopularProduct::all();
@endphp

@include('Frontend.popularproducts')


{{-- All Products --}}

@php
$products = \App\Models\Product::all();
@endphp

@php
$categories = \App\Models\Category::all();
@endphp

{{-- All Products --}}
@include('Frontend.allproducts')



	@endsection
