@extends('template')
@section('title', 'Home')

@section('body')
    <div class="d-flex align-items-center shadow pb-3 mb-3 rounded" style="background-image: url({{ asset('/storage/image/BG.jpg') }}); height: 600px; width: auto;">
        <h1 class="display-1 mx-auto fw-bold" style="color: #ffc10b;">RECYCON SHOP</h1>
    </div>

    <h2 class="display-3 text-center fw-normal py-3 pb-5" style="color: #2a623d;">About Us</h2>
    <div class style= " border-style: dotted; color: #ffc10b; height:100px;">
        <h2 class="text-center py-4 my-2 fw-normal rounded text-dark">We are a shop for buying recycle things and second hand things</h2>
    </div>
    
@endsection