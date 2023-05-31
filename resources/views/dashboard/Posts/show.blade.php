@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <div class="mb-3">
                <h1>{{ $post->title}}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back to My Post</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">
                      <i class="bi bi-x-circle" style="font-size:1rem;"></i> Delete
                    </button>
                </form>

                {{-- tambahkan tags --}}
                <div class="my-3">
                    @foreach ($post->tags as $tag)
                        <div href="/dashboard/posts/tags/{{ $tag->slug }}" class="badge fs-7" style="background-color: #f8f9fa; color: #343a40;">#{{ $tag->name }}</div>
                    @endforeach
                </div>

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
</div>
@endsection
