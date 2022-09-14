@extends('layouts')

@section('title')
  Dashboard
@endsection

@section('content')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @if (session()->has('deleted'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <h2>Section title</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($user as $d)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $d->name }}</td>
              <td>{{ $d->username }}</td>
              <td>{{ $d->email }}</td>
              <td>
                <a href="/dashboard/{{ $d->id }}/edit" class="btn btn-success">
                {{-- <a href="{{ route('dashboard.edit', ['dashboard' => $d->id]) }}" class="btn btn-success"> --}}
                  <p class="text-xs font-weight-bold mb-0">Edit</p>
                </a>
                {{-- <form action="{{ route('dashboard.destroy', ['dashboard' => $d->username]) }}" method="POST" class="d-inline"> --}}
                <form action="/dashboard/{{ $d->id }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin?')">
                    <p class="text-xs font-weight-bold mb-0">Hapus</p>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection
