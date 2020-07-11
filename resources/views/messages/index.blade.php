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
                        <h6 class="">Messages</h6>
                        <a href="{{ route('messages.create') }}">Write a message</a>
                    </div>
                    @forelse ($messages as $message)
                    <div class="media text-muted pt-3">
                        <svg height="2rem" width="2rem" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">From</strong>
                                <a href="{{ route('messages.show', $message) }}">View</a>
                            </div>
                            <span class="d-block">{{ '@' .$message->sender->name }}</span>
                        </div>
                    </div>
                    @empty
                        <p class="border-bottom border-gray pb-2 my-2">No messages available.</p>
                    @endforelse

                    <small class="d-block text-right mt-3">
                        {{ $messages->links() }}
                    </small>

                </div>


            </div>
        </div>
    </div>
@endsection
