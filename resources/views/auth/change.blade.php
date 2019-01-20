@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Info') }}</div>

                    <div class="card-body">
                        {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}

                        {{Form::label('user_name', 'Name')}}
                        {{Form::text('user_name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}

                        {{Form::label('user_email', 'Email')}}
                        {{Form::text('user_email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}

                        {{Form::label('user_password', 'Password')}}
                        {{Form::text('user_password', '', ['class' => 'form-control', 'placeholder' => 'Password'])}}

                        {{Form::label('user_password', 'Confirm password')}}
                        {{Form::text('user_confirm', '', ['class' => 'form-control', 'placeholder' => 'Confirm password'])}}

                        {!! Form::hidden('_method', 'PUT' ) !!}
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
