@extends('layouts.app')

@section('content')
    <a href="{{ route('topics.index') }}" class="btn btn-info">Go back</a>
    <h1>{{ $topic->title }}</h1>
    <p>{{ $topic->content }}</p>

    <hr>
    @auth
        @if(Auth::user()->id == $topic->user_id)
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="{{ route('topics.edit', ['id' => $topic->id]) }}" class="btn btn-warning">edit</a>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        @endif
        <br>
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
    @endauth
        <div>
            @forelse($topic->comments as $comment)
                <div class="card border-secondary mb-1">
                    <div class="card-header">
                        <div class="d-flex flex-row bd-highlight">
                            <div class="p-1 flex-grow-1"><b> {{ $comment->user->name }}: </b></div>
                            @auth
                                @if(Auth::user()->id == $topic->user_id)
                                    <div class="p-1">
                                        {!!Form::open(['action' => ['CommentController@destroy', $comment->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('delete', ['class' => 'btn btn-danger btn-sm pull-right'])}}
                                        {!!Form::close()!!}
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="card-body text-secondary">
                        <p class="card-text"> {{ $comment->content }}</p>
                    </div>
                </div>
            @endforelse
        </div>
@endsection