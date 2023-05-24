@extends('template')
@section('title', 'My Cart')
@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert">
    {{ session('status') }}
  </div>
@endif


<h1 class="text-center text-bg-dark bg-gradient rounded mb-2 pb-2 my-3">My Cart</h1>

@if ($cart->cart->count()<1)
    <div class="py-5 m-5">
        <h2 class="display-1 text-center fw-normal py-5 my-5 m-5">Cart is empty! Let's go Shopping !</h2>
    </div>
@else
    @php($grandTotal=0)
    @php($i=1)
    <table class="table mb-2 pb-2 my-3">
        <thead class="fw-bold">
            <tr>
                <th>No</th>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="m-3">
            @foreach ($cart->cart as $cs)
                @php($product = $cs->products)
                    <tr>
                        @php($total=0)
                        <td><p class="my-3">{{ $i }}</p></td>
                        <td><img width="150px" height="150px" class="shadow m-3 bg-body rounded" src="{{ Storage::url('image/' . $product->image) }}" alt="error"></td>
                        <td><p class="my-3">{{ $product->name }}</p></td>
                        <td><p class="my-3">IDR.{{ $product->price }}</p></td>
                        <td><p class="my-3">{{ $cs->quantity }}</p></td>
                       
                        @php($total = $cs->quantity * $product->price )
                        <td><p class="my-3">IDR.{{ $total }}</p></td>
                       
                        <td class="inline">
                            {{-- Update --}}
                            <a class="btn btn-outline-success mx-3 w-50 my-3 text-center" href="/updateCart/{{ $cs->id }}">Update</a>

                            {{-- Delete --}}
                            <form action="/myCartItems/{{ $cs->id }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <input type="submit" class="btn btn-outline-danger mx-3 w-50 text-center" name="Delete" value="Delete">
                            </form>
                        </td>
                    </tr>
                @php($grandTotal +=$total)
                @php($i++)
            @endforeach

        </tbody>
    </table>
    <h5 class="fw-bold text-start ms-5">Grand Total: IDR.{{ $grandTotal }}</h5>


    <form class="d-flex justify-content-center my-2 px-2 py-2" action="/checkout" method="POST">

        <div class="col-12 shadow p-5  bg-dark bg-gradient justify-content-center rounded">
            @csrf
            <h1 class="text-center text-warning">Receiver</h1>
            <div class="p-2 mb-2">
                <label for="name" class="form-label text-warning fw-normal">Receiver Name</label>
                <input type="text" class="form-control w-75" id="name" name="name" placeholder="Receiver Name" value="{{Auth::user()->name}}">
            </div>

            <div class="p-2 mb-2">
                <label for="address" class="form-label text-warning fw-normal">Receiver Address</label>
                <textarea class="form-control w-75"  id="address" name="address" placeholder="Receiver Address" rows="3"></textarea>
            </div>

            <div class="text-center mb-2 p-3">
                <button type="submit" class="btn btn-warning w-25 text-center">Checkout({{ $i-1 }})</button>
            </div>
        </div>
    </form>
@endif
@endsection
