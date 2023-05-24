@extends('template')
@section('title', 'Add Item')

@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert"> 
    {{ session('status') }}
  </div>
@endif

<h1 class="text-center text-bg-dark bg-gradient mb-2 pb-2 rounded">Add New Item</h1>
<form class="d-flex justify-content-center my-3 px-5 py-2" enctype="multipart/form-data" action="/addItem" method="POST">
    <div class="col-6 shadow p-5 mb-3 bg-dark bg-gradient rounded">
        @csrf
        <div class="d-flex flex-nowrap align-items-start flex-row mb-2">
            <div class="order-1 p-2 ">
                <label for="ItemID" class="form-label text-warning fw-normal">Item ID</label>
                <input type="text" class="form-control w-100" id="ItemID" name="ItemID" placeholder="Enter Item ID">
                
                @if ($errors->has('ItemID'))
                    @foreach ($errors->get('ItemID') as $error)
                        <div id="validateItemID" class="form-text" style="color: red">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <div class="order-2 p-2">
                <label for="price" class="form-label text-warning fw-normal">Item Price</label>
                <input type="text" class="form-control w-100" id="price" name="price" placeholder="Enter Item Price">
                @if ($errors->has('price'))
                @foreach ($errors->get('price') as $error)
                    <div id="validatePrice" class="form-text" style="color: red">{{ $error }}</div>
                @endforeach
            @endif
            </div>
            <div class="order-3 p-2">
                <label for="category" class="form-label text-warning fw-normal">Category</label>
                <select class="form-select" name="category" id="category">
                        <option selected>Choose One</option>
                        <option value="Recycle">Recycle</option>
                        <option value="Second">Second</option>
                </select>
            </div> 
        </div>

        <div class="p-2 mb-2">
            <label for="name" class="form-label text-warning fw-normal">Item Name</label>
            <input type="text" class="form-control w-100" id="name" name="name" placeholder="Enter Item Name">
            @if ($errors->has('name'))
            @foreach ($errors->get('name') as $error)
                <div id="validateName" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
        </div>

        <div class="p-2 mb-2">
            <label for="description" class="form-label text-warning fw-normal">Item Description</label>
            <textarea class="form-control w-100"  id="description" name="description" placeholder="Enter Item Description" rows="3"></textarea>
            @if ($errors->has('description'))
            @foreach ($errors->get('description') as $error)
                <div id="validateDescription" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
        </div>

        <div class="p-2 mb-2">
            <label for="image" class="form-label text-warning fw-normal">Image File Upload</label>
            <input class="form-control w-50" type="file" id="image" name="image">
            @if ($errors->has('image'))
                @foreach ($errors->get('image') as $error)
                    <div id="validateImage" class="form-text" style="color: red">{{ $error }}</div>
                @endforeach
            @endif
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-warning w-25 text-center">Add Item</button>
        </div>
    </div>
</form>
@endsection