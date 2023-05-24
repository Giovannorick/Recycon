@extends('template')
@section('title', 'Manage Item')

@section('body')

@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert"> 
    {{ session('status') }}
  </div>
@endif

<h1 class="text-center text-bg-dark bg-gradient rounded mb-2 pb-2 my-3">Manage Item</h1>

<table class="table mb-2 pb-2 my-3">
    <thead class="fw-bold">
        <tr>
            <th>No</th>
            <th>Item ID</th>
            <th>Item Image</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Item Price</th>
            <th>Item Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="m-3">
        @php($i=1)
        @foreach ($products as $p)
        <tr>
            <td><p class="my-3">{{ $i }}</p></td>
            <td><p class="my-3">{{ $p->ItemID }}</p></td>
            <td><img width="150px" height="150px" class="shadow m-3 bg-body rounded" src="{{ Storage::url('image/' . $p->image) }}" alt="error"></td>
            <td><p class="my-3">{{ $p->name }}</p></td>
            <td><p class="my-3">{{ $p->description }}</p></td>
            <td><p class="my-3">IDR.{{ $p->price }}</p></td>
            <td><p class="my-3">{{ $p->category }}</p></td>
            
            <td class="inline">
                {{-- Update --}}
                <a class="btn btn-outline-success mx-3 w-50 my-3" href="/updateItem/{{ $p->ItemID }}">Update</a>
                
                {{-- Delete --}}
                <form action="/deleteItem/{{ $p->ItemID }}" method="POST">
                    {{ method_field('DELETE') }}
                    @csrf
                    <input type="submit" class="btn btn-outline-danger mx-3 w-50" name="Delete" value="Delete">
                </form>
            </td>
        </tr>
        @php ($i++)
        @endforeach
    </tbody>
</table>
@endsection