@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($users as $user)
        <h4>{{$user->name}}</h4>
        <h6>{{$user->email}}</h6>
        {!! Form::open(['action' => ['UsersController@update'], 'method' => 'PUT']) !!}

        {{Form::label('category', 'Access Level: ')}}
        {{Form::select('access_lv', [1 => 'User',
                                2 => 'Moderator',
                                3 => 'Admin'], $user->access_lv)
        }}

        {!! Form::hidden('user_id', $user->id ) !!}

        {!! Form::hidden('_method', 'PUT' ) !!}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        <hr>
    @endforeach
</div>

@endsection
