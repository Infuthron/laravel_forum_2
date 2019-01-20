@extends('layouts.app')

@section('content')

    <div class="container">
            <h1>Create Topic</h1>
            {!! Form::open(['action' => 'TopicsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('topic_title', 'Topic Title')}}
                    {{Form::text('topic_title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('topic_body', 'Topic Body')}}
                    {{Form::textarea('topic_body', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
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
                                            'off-topic' => 'Off-Topic'], 'original')
                    }}
                </div>
        <br>
            {!! Form::hidden('user_id', $user_id ) !!}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
    </div>
@endsection
