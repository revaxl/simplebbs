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
    {!!Form::open(['action' => ['CommentController@store'], 'method' => 'POST'])!!}
        {{Form::textarea('content', '')}}
        {{ Form::hidden('topic_id', $topic->id) }}
        {{Form::submit('add comment', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}

    <ul class="list-group">
    @forelse($topic->comments as $comment)
        <li class="list-group-item">
        <b> {{ $comment->user->name }}: </b>
            {{ $comment->content }}
        </li>
    @empty
    no comments
    @endforelse
    </ul>
@endsection