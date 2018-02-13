@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-lg-6 mx-auto">
        <a class="btn btn-primary" href="ads/create">Create an ad</a>
        <div class="card">
            <div class="card-header">
                All ads:
            </div>
            @foreach($ads as $ad)
                <ul class="list-group">
                    <li class="list-group-item"><a href="ads/{{ $ad->id }}">{{ $ad->title }}</a></li>
                    <li class="list-group-item">by {{ $ad->author_name }}</li>
                </ul>
            @endforeach
        </div>
    </div>

@endsection
