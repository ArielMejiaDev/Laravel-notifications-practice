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


                <div class="card">
                    <div class="card-header">{{ __('Write message') }}</div>

                    <div class="card-body">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select name="recipient_id" class="form-control custom-select {{ $errors->has('recipient_id') ? 'is-invalid' : '' }}">
                                    <option value="">{{ __('Select a user') }}</option>
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option value="">No users available.</option>
                                        @endforelse
                                </select>
                                @error('recipient_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea cols="30" rows="10" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" style="resize: none"></textarea>
                                @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">{{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
