@extends('layouts.app')

@section('content')

<h1>posts</h1>

@if(count($posts) > 0)
<div class="card">
    <ul class="list-group list-group-flush">
    @foreach($posts as $post)

            <div class='row'>
                            <div class='col-md-4'>
                                    <img style="width: 100%" src="storage/cover_images/{{$post->cover_image}}" alt='' >
                            </div>
                            <div class='col-md-8'>
                                <h4><a href="http://localhost:8080/laravelproject/public/posts/{{$post->id}}">{{$post->title}}</a></h4>
                                <small>Written on {{$post->created_at}}</small>
                            </div>
            </div>

            {{-- <li class="list-group-item">
               

            </li> --}}
            @endforeach
        </ul>
    </div>
@else

@endif

@endsection