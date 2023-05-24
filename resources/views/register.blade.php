@extends('template')
@section('title', 'Register')
@section('body')
@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert"> 
    {{ session('status') }}
  </div>
@endif

<form class="d-flex justify-content-center my-5 px-5 py-5" action="/register" method="POST">
    <div class="col-6 shadow p-5 mb-3 bg-dark bg-gradient rounded">
      <h1 class="display-4 text-warning text-center fw-normal">REGISTER FORM</h1>
        @csrf
        <div class="mb-4">
            <label for="name" class="form-label text-warning fw-normal">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Full Name">

            @if ($errors->has('name'))
              @foreach ($errors->get('name') as $error)
                  <div id="validateName" class="form-text" style="color: red">{{ $error }}</div>
              @endforeach
            @endif
        </div>

        <div class="mb-4">
          <label for="email" class="form-label text-warning fw-normal">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          
          @if ($errors->has('email'))
            @foreach ($errors->get('email') as $error)
                <div id="validateEmail" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
          @endif
        </div>

        <div class="mb-4">
            <label for="pass" class="form-label text-warning fw-normal">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">

            @if ($errors->has('pass'))
              @foreach ($errors->get('pass') as $error)
                  <div id="validatePass" class="form-text" style="color: red">{{ $error }}</div>
              @endforeach
            @endif
        </div>

        <div class="mb-5">
            <label for="confirmPass" class="form-label text-warning fw-normal">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password">

            @if ($errors->has('confirmPass'))
              @foreach ($errors->get('confirmPass') as $error)
                  <div id="validateConfirmPass" class="form-text" style="color: red">{{ $error }}</div>
              @endforeach
            @endif
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-warning w-25 text-center">Register</button>
        </div>
    </div>
</form>
@endsection