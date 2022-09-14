@extends('layouts')

@section('title')
Create Data
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
        @csrf
          <h1 class="h3 mb-3 fw-normal">Create Account</h1>
      
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="yourname" name="name">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-10 btn btn-lg btn-primary" type="submit">Sign up</button>
    </form>
</main>
@endsection