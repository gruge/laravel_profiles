@extends('layout')
@section('title', 'Post')
@section('content')
    <table class="table">
        <tbody>
        <tr>
            <th>ID:</th>
            <td>{{$post->id}}</td>
        </tr>
        <tr>
            <th>Title:</th>
            <td>{{$post->title}}</td>
        </tr>
        <tr>
            <th>Content:</th>
            <td>{{$post->body}}</td>
        </tr>
        <tr>
            <th>Created At:</th>
            <td>{{$post->created_at}}</td>
        </tr>
        <tr>
            <th>Updated At:</th>
            <td>{{$post->updated_at}}</td>
        </tr>
        </tbody>
    </table>
    <form method="POST" action="{{route('posts.destroy', ['post'=> $post->id])}}">
        <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
        @method('DELETE')
        @csrf
        <a class="btn btn-warning" href="{{route('posts.edit', ['post'=>$post->id])}}">Edit</a>
        <input class="btn btn-danger" type="submit" value="Delete">
    </form>
@endsection
