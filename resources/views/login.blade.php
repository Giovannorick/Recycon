@extends('template')
@section('title', 'Login')
@section('body')  
<form class="d-flex justify-content-center my-5 px-5 py-5" action="/login" method="POST">
  <div class="col-4 shadow p-5 mb-5 bg-dark bg-gradient rounded">
    <h1 class="display-4 text-primary text-center fw-normal">SIGN IN</h1>
      @csrf
      <div class="mb-4">
          <label for="email" class="form-label text-primary fw-normal">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
      </div>
      <div class="mb-4">
        <label for="password" class="form-label text-primary fw-normal">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="mb-1 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label text-primary" for="exampleCheck1">Remember Me</label>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary w-25 text-center">Login</button>
      </div>
      
      <div class="mb-1">
        @if ($errors->any())
          <i style="color: red">{{ $errors->first() }}</i> 
        @endif
      </div>
  </div>
</form>
@endsection
