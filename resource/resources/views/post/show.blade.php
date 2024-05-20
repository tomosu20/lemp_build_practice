@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post Show</div>
                <div>
                    <label for="id">ID</label>
                    <div>{{ $post->id }}</div>
                </div>
                <div>
                    <label for="title">Title</label>
                    <div>{{ $post->title }}</div>
                </div>
                <div>
                    <label for="content">Content</label>
                    <div>{{ $post->content }}</div>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route("post.edit", $post->id) }}">Edit</a>
                    <form action="{{ route("post.delete", $post->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div>
                    <a class="btn" href="{{ route("post.index") }}">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
