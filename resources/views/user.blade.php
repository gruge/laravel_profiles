@extends('layout')
@section('title', $user->name)
@section('content')
    <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Count of posts: {{ $user->posts()->count() }}</p>
            <p class="card-text">Count of comments: {{ $user->comments()->count() }}</p>
        </div>
    </div>
    <div class="row row-cols-4">
        @foreach($user->posts()->paginate() as $post)
            <div class="col">
                <div class="card mt-3">
                    @if($post->images->count() > 1)
                        @include('partials.carousel', ['images' => $post->images, 'id' => $post->id])
                    @elseif($post->images->count() == 1)
                        <img src="{{$post->images->first()->path}}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="card-text text-muted"><b>Comments:</b> {{ $post->comments()->count() }}</p>
                        <p class="card-text text-muted"><b>Likes:</b> {{ $post->likes()->count() }}</p>

                        <a href="{{ route('post.like', ['post' => $post->id]) }}" class="card-link">
                            @if($post->auth_has_liked)
                                Unlike
                            @else
                                Like
                            @endif
                        </a>
                        <p class="card-text text-muted">
                            @foreach($post->tags as $tag)
                                <a href="/tag/{{$tag->id}}">{{$tag->name}}</a>
                            @endforeach
                        </p>
                        <a href="{{ route('post', ['post' => $post->id]) }}" class="card-link">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
