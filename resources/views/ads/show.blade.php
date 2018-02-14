@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                {{ $ad->title }}
            </div>
            <ul class="list-group">
                <li class="list-group-item">{{ $ad->description }}</li>
                <li class="list-group-item">by {{ $ad->author_name }}</li>
                <li class="list-group-item">by {{ $ad->created_at }}</li>
            </ul>
        </div>
        <div class="mx-auto text-center">
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->id == $ad->user_id)
                        <a href="{{ $ad->id }}/edit" class="btn btn-primary">Edit</a>
                    @endif
                @endauth
            @endif
            <a href="{{ url('/') }}" class="btn btn-secondary">Go back</a>
        </div>
    </div>
@endsection