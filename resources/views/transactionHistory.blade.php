@php($transactions = Auth::user()->transactions)
@php($count = Auth::user()->transactions->count())

@extends('template')
@section('title', 'Transaction History')

@section('body')
<h1 class="text-center text-bg-dark bg-gradient rounded mb-2 pb-2 my-3">My Transaction History</h1>

@if ($transactions->count()==0)
    <div class="py-5 m-5">
        <h2 class="display-1 text-center fw-normal py-5 my-5 m-5">Transaction History is empty! Let's go Shopping!</h2>
    </div>
@else
  <div class="accordion" id="accordionPanelsStayOpenExample">
      @foreach ($transactions as $tr)
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-heading{{$tr->id}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$tr->id}}">
              <h5 class="fw-bold text-warning">{{$tr->created_at->format('Y-m-d')}}</h5>
            </button>
          </h2>
          <div id="panelsStayOpen-collapse{{$tr->id}}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading{{$tr->id}}">
            <div class="accordion-body">
              <table class="table mb-2 pb-2 my-3">
                @php($total=0)
                <thead class="fw-bold"> 
                    <tr>
                        <th>No</th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody class="m-3">
                  @php($i=1)
                  @foreach ($tr->detail as $d)
                    @php($p = $d->product)
                    <tr>
                        <td><p class="my-3">{{ $i }}</p></td>
                        <td><img width="150px" height="150px" class="shadow m-3 bg-body rounded" src="{{ Storage::url('image/' . $p->image) }}" alt="error"></td>
                        <td><p class="my-3">{{ $p->name }}</p></td>
                        <td><p class="my-3">{{ $d->quantity }}</p></td>
                        <td><p class="my-3">IDR.{{ $p->price }}</p></td>
                    </tr>
                    @php($i++)
                    @php($total+= $p->price)
                  @endforeach
                </tbody>
              </table>
              <h5 class="fw-normal text-end me-5">Grand Total: IDR.{{ $total }}</h5>
            </div>
          </div>
        </div>
      @endforeach
  </div>
@endif
@endsection
