@extends('backend.mster')

@section('title', 'Manage Product')

@section('content')
    <div class="container-fluid px-4 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-5">Manage Product</h1>
                @if (Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category ID</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="{{asset('/')}}{{ $product->image }}" alt="" width="60">
                                </td>
                                <td>{{ $product->status== 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{route('product.edit', $product->id)}}" class="me-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('product.destroy', $product->id)}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
