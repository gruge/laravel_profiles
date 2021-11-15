@extends('layout')
@section('title', 'Posts')
@section('content')
    {{$posts->links()}}
    <div class="row row-cols-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card mt-3">
                    @if($post->images->count() > 1)
                        @include('partials.carousel', ['images' => $post->images, 'id' => $post->id])
                    @elseif($post->images->count() == 1)
                        <img src="{{$post->images->first()->path}}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">
                            <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                        </p>
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
    {{$posts->links()}}
@endsection
