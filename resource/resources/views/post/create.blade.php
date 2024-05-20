@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post Add</div>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label class="h3" for="title">Title</label>
                        <div>
                            <input name="title" type="text" value="">
                        </div>
                    </div>
                    <div>
                        <label class="h3" for="content">Content</label>
                        <div>
                            <input name="content" type="text" value="">
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Save">
                    </div>
                </form>
                <div>
                    <a class="btn" href="{{ route("post.index") }}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection