@extends('template')
@section('title', 'Change Password')
@section('body') 

@if (session('status'))
  <div class="alert alert-success text-center rounded justify-content-center" role="alert">
      {{ session('status') }}
  </div>
@endif

<form class="d-flex justify-content-center my-5 px-5 py-5" action="/changePassword" method="POST">
  <div class="col-6 shadow p-5 mb-5 bg-dark bg-gradient rounded">
    <h1 class="display-4 text-primary text-center fw-normal">Change Password</h1>
      @csrf
      <div class="mb-4">
          <label for="oldPass" class="form-label text-primary fw-normal">Old Password</label>
          <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Old Password">

        @if ($errors->has('oldPass'))
            @foreach ($errors->get('oldPass') as $error)
                <div id="validateOldPass" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
      </div>
      <div class="mb-4">
        <label for="newPass" class="form-label text-primary fw-normal">New Password</label>
        <input type="password" class="form-control" id="newPass" name="newPass" placeholder="New Password">
        
        @if ($errors->has('newPass'))
            @foreach ($errors->get('newPass') as $error)
                <div id="validateNewPass" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
      </div>
      <div class="mb-4">
        <label for="confirmPass" class="form-label text-primary fw-normal">Confirm New Password</label>
        <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm New Password">
        
        @if ($errors->has('confirmPass'))
            @foreach ($errors->get('confirmPass') as $error)
                <div id="validateConfirmPass" class="form-text" style="color: red">{{ $error }}</div>
            @endforeach
        @endif
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-warning w-0 text-center">Save</button>
      </div>
  </div>
</form>
@endsection
