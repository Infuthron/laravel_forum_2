@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Edit Topic</h1>
        {!! Form::open(['action' => ['TopicsController@update', $topic->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('topic_title', 'Topic Title')}}
            {{Form::text('topic_title', $topic->topic_title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('topic_body', 'Topic Body')}}
            {{Form::textarea('topic_body', $topic->topic_body, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div>
            {{Form::label('category', 'Topic Category')}}
            {{Form::select('topic_category', ['original' => 'Original Trilogy',
                                    'prequels' => 'Prequels',
                                    'sequels' => 'Sequels',
                                    'shows' => 'Tv Shows',
                                    'games' => 'Games',
                                    'books' => 'Books',
                                    'comics' => 'Comics',
                                    'off-topic' => 'Off-Topic'], $topic->topic_category)
            }}
        </div>
        <br>
        {!! Form::hidden('_method', 'PUT' ) !!}
        {!! Form::hidden('user_id', $topic->user_id ) !!}

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
