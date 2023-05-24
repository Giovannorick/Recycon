@extends('template')
@section('title', 'Update Item')

@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert"> 
    {{ session('status') }}
  </div>
@endif

<h1 class="text-center text-bg-dark bg-gradient mb-2 pb-2 rounded">Update Item</h1>
<form class="d-flex justify-content-center my-3 px-5 py-2"  enctype="multipart/form-data" action="/updateItem/{{ $product -> ItemID}}" method="POST">
    <div class="col-6 shadow p-5 mb-3 bg-dark bg-gradient rounded">
        @csrf
        <div class="d-flex flex-nowrap align-items-start flex-row mb-2">
            <div class="order-1 p-2 ">
                <label for="ItemID" class="form-label text-warning fw-normal">Item ID</label>
                <input type="text" class="form-control w-100" id="ItemID" name="ItemID" placeholder=" Item ID" value="{{ $product -> ItemID }}">
                
                @if ($errors->has('ItemID'))
                    @foreach ($errors->get('ItemID') as $error)
                        <div id="validateItemID" class="form-text" style="color: red">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <div class="order-2 p-2">
                <label for="price" class="form-label text-warning fw-normal">Item Price</label>
                <input type="text" class="form-control w-100" id="price" name="price" placeholder=" Item Price" value="{{ $product -> price }}">
                @if ($errors->has('price'))
                @foreach ($errors->get('price') as $error)
                    <div id="validatePrice" class="form-text" style="color: red">{{ $error }}</div>
                @endforeach
            @endif
            </div>
            <div class="order-3 p-2">
                <label for="category" class="form-label text-warning fw-normal">Category</label>
                <select class="form-select" name="category" id="category">
                    <option selected>{{ $product -> category }}</option>
                    @if ($product -> category == 'Recycle')
                        <option value="Second">Second</option>
                    @else 
                        <option value="Recycle">Recycle</option>
                    @endif
                </select>
            </div> 
        </div>

        <div class="p-2 mb-2">
            <label for="name" class="form-label text-warning fw-normal">Item Name</label>
            <input type="text" class="form-control w-100" id="name" name="name" placeholder="Item Name" value="{{ $product -> name }}">
            @if ($errors->has('name'))
            @foreach ($errors->get('name') as $error)
                <div id="validateName" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
        </div>

        <div class="p-2 mb-2">
            <label for="description" class="form-label text-warning fw-normal">Item Description</label>
            <textarea class="form-control w-100"  id="description" name="description" placeholder="Item Description" rows="3">{{ $product -> description }}</textarea>
            @if ($errors->has('description'))
            @foreach ($errors->get('description') as $error)
                <div id="validateDescription" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
        </div>

        <div class="d-flex flex-nowrap align-items-start flex-row mb-2">
            <div class="order-1 p-2">
                <label for="itemImage" class="form-label text-warning fw-normal">Item Image</label>
                <img class="shadow m-3 bg-body rounded px-2"  height="100px" width="100px" src="{{ asset('/storage/image/'.$product->image)}}" alt="Error">
            </div>
            <div class="order-2 p-2 mx-5">
                <label for="itemImageName" class="form-label text-warning fw-normal">Item Image File</label>
                <input class="form-control" type="text" id="itemImageName" name="itemImageName" placeholder="Item Image Name" value="{{ $product -> image }}" disabled>
            </div>
        </div>
        
        <div class="p-2 mb-2">
            <label for="image" class="form-label text-warning fw-normal">New Image</label>
            <input class="form-control w-50" type="file" id="image" name="image">
            @if ($errors->has('image'))
                @foreach ($errors->get('image') as $error)
                    <div id="validateImage" class="form-text" style="color: red">{{ $error }}</div>
                @endforeach
            @endif
        </div>

        <input type="hidden" id="currentID" name="currentID" value="{{ $product -> ItemID }}">

        <div class="text-center">
          <button type="submit" class="btn btn-warning w-25 text-center">Update</button>
        </div>
    </div>
</form>

@endsection