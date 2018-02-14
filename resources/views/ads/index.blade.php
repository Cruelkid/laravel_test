@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-lg-6 mx-auto">
        <!--var_dump(Auth::user()->id);die;-->

        @if (Route::has('login'))
            @auth
            <a href="create" class="btn btn-primary">Create an ad</a>
            @endauth
        @endif

        <div class="card">
            <div class="card-header">
                All ads:
            </div>
            @foreach($ads as $ad)
                <ul class="list-group">

                    <li class="list-group-item">
                        <a href="{{ $ad->id }}">{{ $ad->title }}</a>
                        <div class="float-right">
                            <a href="{{ $ad->id }}/edit" class="d-block">Edit</a>
                            @auth
                            @if (Auth::user()->id == $ad->user_id)
                                <a href="#" class="d-block"
                                   onclick="
                                        var result = confirm('Are you sure you want to delete?');
                                        if (result) {
                                            event.preventDefault();
                                            document.getElementById('delete-form').submit();
                                        }"
                                >Delete</a>

                                <form id="delete-form" action="{{ route('ads.destroy', [$ad->id]) }}"
                                      method="post" style="display: none;">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                            @endauth
                        </div>
                    </li>
                    <li class="list-group-item">{{ $ad->description }}</li>
                    <li class="list-group-item">
                        <h6 class="float-right">by "{{ $ad->author_name }}" at: {{ $ad->created_at }}</h6>
                    </li>
                </ul>
            @endforeach
            {{ $ads->links() }}
        </div>
    </div>

@endsection
