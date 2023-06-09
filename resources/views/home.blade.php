@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="http://localhost:8080/laravelproject/public/posts/create">Create Post</a>
                    <hr>
                    <h3>Your personal blog post</h3>

                    @if(count($posts) > 0)
                    <table class='table table-stripped'>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <th>{{$post->title}}</th>
                                <th><a href="http://localhost:8080/laravelproject/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                                <th></th>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have empty posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
