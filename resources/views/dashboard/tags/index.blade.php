@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Tags</h1>
    </div>
    @if (session()->has('success'))
      <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/tags/create" class="btn btn-primary mb-3">Create New Tag</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tag Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="/dashboard/tags/{{ $tag->slug }}" class="badge bg-info">
                            <i class="bi bi-eye" style="font-size:1rem;"></i>
                        </a>
                        <a href="/dashboard/tags/{{ $tag->slug }}/edit" class="badge bg-warning">
                            <i class="bi bi-pencil-square" style="font-size:1rem;"></i>
                        </a>
                        <form action="/dashboard/tags/{{ $tag->slug}}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                            <i class="bi bi-x-circle" style="font-size:1rem;"></i>
                          </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
