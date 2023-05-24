@extends('template')
@section('title', 'Product Detail')

@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert">
    {{ session('status') }}
  </div>
@endif

<h1 class="text-center text-bg-dark bg-gradient mb-2 pb-2 rounded">Product Details</h1>

<div class="container-fluid row p-1 px-5">
    <div class="d-flex col-5 px-4 py-2">
        <img  class="shadow-lg mb-5 bg-body rounded"  height="550px" width="500px" src="{{ asset('/storage/image/'.$product->image)}}" alt="Error">
    </div>
    <div class="col-5">
        <h5 class="display-3 fw-bolder text-warning mb-3">{{ $product->name}}</h5>
        <h4 class="fw-bold">Category: </h4>
        <h5 class="fst-italic" style="color: red">{{ $product->category}}</h5>
        <hr>
        <h4 class="fw-bold">Price: </h4>
        <h5 class="fst-italic" style="color: red">IDR. {{ $product->price }}</h5>
        <hr>
        <h4 class="fw-bold">Description: </h4>
        <h5 class="fst-italic" style="color: red">{{ $product->description }}</h5>
        <hr>
        @auth
            @if (Auth::user()->isAdmin == false)
                <form action="/addCart" method="POST">
                    @csrf
                    <h4 class="fw-bold">Quantity: </h4>
                    <input type="number" id="quantity" name="quantity" min="1" max="99" style="width: 50px; color: red">
                    <input type="hidden" id="productID" name="productID" value="{{ $product->ItemID }}">
                    <input class="btn btn-outline-warning" type="submit" value="Add Cart">
                    <hr>
                </form>
            @endif
        @else
            <a href="/login">
                <button class="btn btn-outline-warning">Login to buy</button>
            </a>
        @endauth
    </div>
</div>
@endsection
