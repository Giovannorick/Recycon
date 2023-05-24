@extends('template')
@section('title', 'Login')
@section('body')
<form class="d-flex justify-content-center my-5 px-5 py-5" action="/login" method="POST">
  <div class="col-4 shadow p-5 mb-5 bg-dark bg-gradient rounded">
    <h1 class="display-4 text-warning text-center fw-normal">SIGN IN</h1>
      @csrf
      <div class="mb-4">
          <label for="email" class="form-label text-warning fw-normal">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value={{Cookie::get('email') != null ? Cookie::get('email') : ""}}>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label text-warning fw-normal">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value={{Cookie::get('email') != null ? Cookie::get('password') : ""}}>
      </div>

      <div class="mb-1 form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" value="on">
        <label class="form-check-label text-warning" for="remember_me">Remember me</label>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-warning w-25 text-center">Login</button>
      </div>

      <div class="mb-1">
        @if ($errors->any())
          <i style="color: red">{{ $errors->first() }}</i>
        @endif
      </div>
  </div>
</form>
@endsection
