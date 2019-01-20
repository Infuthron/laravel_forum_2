@extends('layouts.app')

@section('content')

    <div class="container">
        <div>
            <h1></h1>
            @if (count($topics) > 0)
                @foreach($topics as $topic)
                    <div class="well">
                        <h3><a href="/laravel_forum_2/public/topic/{{$topic->id}} " class="">{{$topic->topic_title}}</a></h3>
                        <small>Written on {{$topic->created_at}} by
                            @foreach($user_names as $user_name)
                                @if ($topic->user_id == $user_name->id)
                                    {{ $user_name->name}}
                                @endif
                            @endforeach
                        </small>
                    </div>
                @endforeach
            @else
                <h6>No topics found</h6>
            @endif
            {{ $topics->links() }}
        </div>
    </div>

@endsection
