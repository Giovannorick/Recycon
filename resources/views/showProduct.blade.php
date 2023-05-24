@extends('template')
@section('title', 'Show Product')

@section('body')
<h1 class="text-center text-bg-dark bg-gradient rounded mb-2 pb-2 my-3">Our Product</h1>
<div class="container-fluid px-5 py-1">
    <div class="row row-cols-1 row-cols-md-3 g-5 mx-2 my-2">
        @foreach ($products as $p)
        <div class="col">
            <div class="card mb-5 bg-body rounded">
                    <img height="300px" width="500px" class="card-img-top bg-body rounded" src="{{ asset('/storage/image/' . $p->image)}}" alt="Error">
                    <div class="card-body bg-dark bg-gradient py-3">
                        <h3 class="card-title text-warning fw-normal">{{$p->name}}</h3>
                        <p class="card-subtitle text-light fw-bold">{{$p->category}}</p>
                        <p class="card-subtitle text-light mt-1 fw-lighter">IDR. {{$p->price}}</p>
                        <a class="btn btn-outline-warning mt-2" href="/productDetail/{{ $p->ItemID }}">Detail Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="mb-3 mt-3 d-flex justify-content-center">
    {{ $products->withQueryString()->links()}}
</div>
@endsection
