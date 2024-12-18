<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Popular Products</h1>
            {{-- <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p> --}}
        </div>
    </div>

    <div class="row">
        @foreach ( $popularproducts as $pp )
        <div class="col-12 col-md-3 p-5 mt-3">
            <a href="">
                <div class="image-container rounded-circle border">
                    <img src="{{ asset('productsimg/' . $pp->product->image) }}" alt="{{$pp->product->name}}">
                </div>
            </a>
            <h5 class="text-center mt-3 mb-3" style="margin-right:30px;">{{$pp->product->name}}</h5>
            {{-- <p class="text-center"><a class="btn btn-dark">Go Shop</a></p> --}}
        </div>
        @endforeach

    </div>
</section>

<style>
    .image-container {
        width: 150px;
        height: 150px;
        /* border-radius: 50%; */
        overflow: hidden;
        border: 5px solid #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
