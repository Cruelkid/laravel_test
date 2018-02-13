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
        <a href="../ads">Go back</a>
    </div>
@endsection