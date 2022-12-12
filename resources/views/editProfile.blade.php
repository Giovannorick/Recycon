@extends('template')
@section('title', 'Edit Profile')
@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert">
      {{ session('status') }}
  </div>
@endif

<form class="d-flex justify-content-center my-5 px-5 py-5" action="/editProfile" method="POST">
  <div class="col-6 shadow p-5 mb-5 bg-dark bg-gradient rounded">
    <h1 class="display-4 text-primary text-center fw-normal">Edit Profile</h1>
      @csrf
      <div class="mb-4">
          <label for="name" class="form-label text-primary fw-normal">New Username</label>
          <input type="name" class="form-control" id="name" name="name" placeholder="New Username">

        @if ($errors->has('name'))
            @foreach ($errors->get('name') as $error)
                <div id="validateName" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
      </div>
      <div class="mb-4">
        <label for="email" class="form-label text-primary fw-normal">New Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="New Email">
        
        @if ($errors->has('email'))
            @foreach ($errors->get('email') as $error)
                <div id="validateEmail" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-warning w-0 text-center">Save</button>
      </div>
  </div>
</form>
@endsection