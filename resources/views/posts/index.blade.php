@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <div class="d-flex justify-content-between border-bottom border-gray pb-2 mb-0">
                        <h6 class="">Posts</h6>
                        <a href="{{ route('posts.create') }}">Write a posts</a>
                    </div>
                    @forelse ($posts as $post)
                        <div class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                                <a href="{{ route('posts.show', $post) }}" class="d-block">{{ $post->title }}</a>
                            </div>
                        </div>
                    @empty
                        <p class="border-bottom border-gray pb-2 mb-0">No posts available.</p>
                    @endforelse

                    <small class="d-block text-right mt-3">
                        {{ $posts->links() }}
                    </small>

                </div>


            </div>
        </div>
    </div>
@endsection
