@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row pt-5">
            <h2>Topic Categories</h2>
            <hr>
        </div>
        <div class="row pl-5">
            <ul>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/original" class="">The Original Trilogy</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/prequels" class="">The Prequels</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/sequels" class="">The Sequels</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/shows" class="">The Tv Shows</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/games" class="">The Games</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/books" class="">The Books</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/comics" class="">The Comics</a></li>
                <li class="p-2"><a href="/laravel_forum_2/public/home/pages/off-topic" class="">Off-Topic</a></li>
            </ul>
        </div>
    </div>
@endsection
