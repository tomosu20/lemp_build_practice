@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post Edit</div>
                <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div>
                        <label class="h3" for="id">ID</label>
                        <div>{{ $post->id }}</div>
                    </div>
                    <div>
                        <label class="h3" for="title">Title</label>
                        <div>
                            <input name="title" type="text" value="{{ $post->title }}">
                        </div>
                    </div>
                    <div>
                        <label class="h3" for="content">Content</label>
                        <div>
                            <input name="content" type="text" value="{{ $post->content }}">
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
                <div>
                    <a class="btn" href="{{ route("post.show", $post->id) }}">キャンセル</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection