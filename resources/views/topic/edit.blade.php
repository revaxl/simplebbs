@extends('layouts.app')

@section('content')
    <h1>Add new Topic</h1>

    {!! Form::open(['action' => ['TopicController@update', 'id' => $topic->id], 'method' => 'POST']) !!}
    {{ Form::label('title', 'post title') }}
    {{ Form::text('title', $topic->title) }}
    {{ Form::label('title', 'content') }}
    {{ Form::textarea('content', $topic->content) }}
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('save') }}
    {!! Form::close() !!}
@endsection