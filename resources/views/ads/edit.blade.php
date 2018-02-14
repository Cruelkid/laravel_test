@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('ads.update', [$ad->id]) }}" class="col-md-6 col-lg-6 mx-auto">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="title">Ad title</label>
            <input type="text" class="form-control" name="title" value="{{ $ad->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Ad description</label>
            <textarea class="form-control" name="description" rows="3" required>{{ $ad->description }}</textarea>
        </div>
        <h4 class="text-center">By "{{ $ad->author_name }}"</h4>
        <h5 class="text-center">Created at {{ $ad->created_at }}</h5>
        <div class="mx-auto text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary">Go back</a>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection