@extends('layout')
@section('title', 'Posts')
@section('content')
    {{ $posts->links() }}

    @include('partials.posts', ['posts' => $posts])

    {{ $posts->links() }}
@endsection
