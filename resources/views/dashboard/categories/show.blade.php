@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <div class="mb-3">
                <h1>{{ $category->title}}</h1>

                <a href="/dashboard/categories" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back to My Category</a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/categories/{{ $category->slug}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">
                      <i class="bi bi-x-circle" style="font-size:1rem;"></i> Delete
                    </button>
                </form>

                <div class="mt-3">
                    <h1>Category {{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
