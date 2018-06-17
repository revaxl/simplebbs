@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a simple Bulletin Board System.</p>
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a></p>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <p><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <h1>Latest Topics</h1>
        <div class="row">
            @foreach($topics as $topic)
                <div class="col-md-4">
                    <h2>{{ $topic->title }}</h2>
                    <p>{{ $topic->content }}</p>
                    <p><a class="btn btn-secondary" href="{{ route('topics.show', ['id' => $topic->id]) }}"
                        role="button">View More &raquo;</a>
                    </p>
                </div>
            @endforeach
        </div>
@endsection
