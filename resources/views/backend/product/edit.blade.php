@extends('backend.mster')

@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid px-4 mt-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1 class="text-center">Edit Product</h1>
                <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$products->price}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$products->description}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" value="{{$products->image}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection