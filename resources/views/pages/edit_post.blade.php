@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('post_body', 'Post')}}
            {{Form::textarea('post_body', $post->post_body, ['class' => 'form-control', 'placeholder' => 'Type Your post here'])}}
        </div>
        <br>
        {!! Form::hidden('_method', 'PUT' ) !!}
        {!! Form::hidden('topic_id', $post->id ) !!}
        {{Form::submit('Post', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
