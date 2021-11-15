@extends('layout')
@section('title', $user->name)
@section('content')
    <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Posts: {{ $user->posts()->count() }}</p>
            <p class="card-text">Comments: {{ $user->comments()->count() }}</p>
            <p class="card-text">Rating: {{ $user->hadLiked()->count() }}</p>
        </div>
    </div>

    @include('partials.posts', ['posts' => $user->posts()->paginate()])

    {{ $user->posts()->paginate()->links() }}
@endsection
