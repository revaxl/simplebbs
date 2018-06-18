@extends('layouts.app')

@section('content')
    <h1>Add new Topic</h1>
	@include('inc.errors')
	
    {!! Form::open(['action' => 'TopicController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'post title') }}
            {{ Form::text('title', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('title', 'content') }}
            {{ Form::textarea('content', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('save', ['class' => 'form-control btn btn-success']) }}
        </div>
    {!! Form::close() !!}
@endsection