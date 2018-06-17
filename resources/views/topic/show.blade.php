@extends('layouts.app')

@section('content')
    <a href="{{ route('topics.index') }}" class="btn btn-primary">Go back</a>
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->content }}</p>

    <hr>
    @auth
        @if(Auth::user()->id == $topic->user_id)
            <a href="{{ route('topics.edit', ['id' => $topic->id]) }}">edit</a>
            {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif

        <div>
        {!!Form::open(['action' => ['CommentController@store'], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::textarea('content', '', [
                    'class' => 'form-control',
                    'placeholder' => 'write a comment here',
                    'rows' => 4
                ])}}
            </div>
            {{ Form::hidden('topic_id', $topic->id) }}
            <div class="form-group">
            {{Form::submit('add comment', ['class' => 'btn btn-primary'])}}
            </div>
        {!!Form::close()!!}
        </div>

        <div>
            <ul class="list-group">
            @forelse($topic->comments as $comment)
                <li class="list-group-item">
                <b> {{ $comment->user->name }}: </b>
                <p> {{ $comment->content }} </p>
                    {!!Form::open(['action' => ['CommentController@destroy', $comment->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </li>
            @empty

            no comments

            @endforelse
            </ul>
        </div>
    @endauth

@endsection