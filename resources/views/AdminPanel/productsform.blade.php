@extends('AdminPanel.layout.main')

@section('main-container')
<div class="card  mt-3 mx-auto" style="width:50rem;">

    <div class="card-header mt-2">
        <h3>{{$title}}</h3>
    </div>


        <div class="card-body">

                <form action="{{url($url)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Category Name:</label>
                    <select name="category" class="form-select" data-live-search="true" aria-label="Default select example">
                        <option selected disabled>Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"
                                @if ($category->category_id == $products->category_id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{$products->name}}"/>
                    @error('name')
                     <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <input type="text" name="description" class="form-control" value="{{$products->description}}"/>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">MRP Price:</label>
                    <input type="text" name="price" class="form-control" value="{{$products->price}}"/>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Discount Price:</label>
                    <input type="text" name="discount_price" class="form-control" value="{{$products->discount_price}}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image:</label>
                    @if(!empty($products->image))
                        <div class="mb-2">
                            <img src="{{ asset('productsimg/' . $products->image) }}" alt="Product Image" style="width: 200px; height: 150px;" />
                        </div>
                    @endif
                    <label for="formFile" class="form-label">Upload New Image (optional):</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
            </form>
        </div>


</div>
@endsection
