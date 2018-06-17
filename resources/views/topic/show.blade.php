@extends('layouts.app')

@section('content')
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->content }}</p>
    <hr>
    <a href="{{ route('topics.edit', ['id' => $topic->id]) }}">edit</a>
    {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    <hr>
@endsection