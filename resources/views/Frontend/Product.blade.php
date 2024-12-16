@extends('Frontend.layout.main')
@section('main-container')
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
