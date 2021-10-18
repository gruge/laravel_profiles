@extends('layout')
@section('title', 'Edit ' . $post->title)
@section('content')
    <form method="POST" action="{{route('posts.update', ['post' => $post->id])}}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea class="form-control" id="body" rows="15" name="body">{{$post->body}}</textarea>
        </div>
        @error('image')
        @foreach($errors->get('image') as $error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <input type="submit" class="btn btn-primary" value="Edit">
        <a class="btn btn-primary" href="{{url()->previous()}}">Back</a>
    </form>
@endsection
