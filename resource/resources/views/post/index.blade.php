@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div>
                    <a class="btn btn-primary" href="{{ route("post.create") }}">Add Post</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th>
                                    <a href="{{ route("post.show", $post->id) }}">{{ $post->id }}</a>
                                </th>
                                <th>{{ $post->title }}</th>
                                <th>{{ $post->content }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
