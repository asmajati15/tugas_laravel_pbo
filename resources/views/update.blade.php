@extends('layouts')

@section('title')
Update Data
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="/dashboard/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
          <h1 class="h3 mb-3 fw-normal">Update Account</h1>
      
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="yourname" name="name" value="{{ old('name') }}">
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" value="{{ old('username') }}">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email', $user->email) }}">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password" value="{{ old('password', $user->password) }}">
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-10 btn btn-lg btn-primary" type="submit">Edit</button>
    </form>
</main>
@endsection