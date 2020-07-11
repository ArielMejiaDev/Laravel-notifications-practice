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
                        <h6 class="">{{ $post->title }}</h6>
                    </div>

                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 lh-125">
                            <div class="d-block">{{ $post->body }}</div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
