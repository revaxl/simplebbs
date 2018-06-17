@extends('layouts.app')

@section('content')
    <h1>Add new Topic</h1>

    {!! Form::open(['action' => 'TopicController@store', 'method' => 'POST']) !!}
        {{ Form::label('title', 'post title') }}
        {{ Form::text('title', '') }}
        {{ Form::label('title', 'content') }}
        {{ Form::textarea('content', '') }}
        {{ Form::submit('save') }}
    {!! Form::close() !!}
@endsection