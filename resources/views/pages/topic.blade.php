@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h1>{{$topic->topic_title}}</h1>
        </div>
        <div class="row">
            {{$topic->topic_body}}
        </div>
        <small>Written on {{$topic->created_at}} by
            @foreach($user_names as $user_name)
                @if ($topic->user_id == $user_name->id)
                    {{ $user_name->name}}
                @endif
            @endforeach
        </small>
    </div>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $topic->user_id || Auth::user()->access_lv >= 2)
            <div class="container">
                <a class="btn btn-dark" href="/laravel_forum_2/public/topics/{{$topic->id}}/edit">Edit</a>
            </div>
            <div class="container p-3">
                {!! Form::open(['action' => ['TopicsController@destroy', $topic->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {!! Form::hidden('_method', 'DELETE' ) !!}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            </div>
        @endif
    @endif
    <hr>
    <div class="container">
        @if (count($posts) > 0)
            @foreach($posts as $post)
                <div class="well">
                    <p>{{$post->post_body}}</p>
                    <small>Written on {{$post->created_at}} by
                        @foreach($user_names as $user_name)
                            @if ($post->user_id == $user_name->id)
                                {{ $user_name->name}}
                            @endif
                        @endforeach
                    </small>
                </div>
                @if(!Auth::guest())
                    @if (Auth::user()->id == $post->user_id || Auth::user()->access_lv >= 2)
                    <div class="container">
                        <a class="btn btn-dark" href="/laravel_forum_2/public/posts/{{$post->id}}/edit">Edit</a>
                    </div>
                    @endif
                @endif

                <hr>
            @endforeach
        @else
            <h6>Nothing has been posted yet</h6>
        @endif
            {{ $posts->links() }}
    </div>
    <hr>
    <div>
        <div class="container">
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('post_body', 'Post')}}
                {{Form::textarea('post_body', '', ['class' => 'form-control', 'placeholder' => 'Type Your post here'])}}
            </div>
            <br>
            {!! Form::hidden('topic_id', $topic->id ) !!}
                {{Form::submit('Post', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

