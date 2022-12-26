@extends('template')
@section('title', 'Home')

@section('body')
    <div class="d-flex align-items-center shadow p-5 mb-5 rounded" style="background-image: url({{ asset('/storage/image/BG.jpg') }}); height: 600px; width: auto;">
        <h1 class="display-1 mx-auto fw-bold" style="color: yellow;">RECYCON SHOP</h1>
    </div>

    <h2 class="display-3 text-center fw-normal py-3" style="color: green;">About Us</h2>
    <h2 class="text-center py-4 my-1 fw-normal rounded" style="border-style: dotted; height:120px;">We are a shop for buying recycle things and second hand things</h2>
    
@endsection