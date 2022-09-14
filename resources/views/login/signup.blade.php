@extends('login/layouts')

@section('title')
Sign Up
@endsection

@section('content')
<form action="{{ route('signup.post') }}" method="post" enctype="multipart/form-data">
    @csrf
      <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
  
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="yourname" name="name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
  
      <small>&copy; Alredy have account??<a href="{{ route('login.admin') }}">Login here</a></small>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
      <p class="mt-5 mb-3 text-muted">&copy; Asmajati Ananto</p>
</form>
@endsection