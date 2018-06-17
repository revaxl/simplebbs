@extends('layouts.app')

@section('content')
    <h1>Add new Topic</h1>

    {!! Form::open(['action' => ['TopicController@update', 'id' => $topic->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'post title') }}
            {{ Form::text('title', $topic->title, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('content', 'content') }}
            {{ Form::textarea('content', $topic->content, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('save', ['class' => 'form-control btn btn-success']) }}
        </div>
    {!! Form::close() !!}
@endsection