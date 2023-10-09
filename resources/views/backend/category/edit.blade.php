@extends('backend.mster')

@section('title', 'Edit Category')

@section('content')
    <div class="container-fluid px-4 mt-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h1 class="text-center">Edit Category</h1>
                <form action="{{route('category.update', $categories->id)}}" method="POST">

                    @csrf

                    @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$categories->name}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
