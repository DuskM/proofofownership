@extends('layouts.app')

@section('content')
    <a href="/domain" class="bn btn">Go back</a>
    <h1>{{$domain->urlname}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <br>
    <div>
        {!!  $post->body!!}
    </div>
    <hr>
    <small>Written on {{$domain->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $domain->user_id)
            <a href="/posts/{{$post->id}}/edit" class="'tn btn-default">Edit</a>
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! !Form::close() !!}
        @endif
    @endif
@endsection