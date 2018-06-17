@extends('layouts.app')

@section('content')
    <h1>Topics</h1>
    @forelse($topics as $topic)
        <a href="{{ route('topics.show', ['id' => $topic->id]) }}">{{ $topic->title }}</a>
    @empty
        <p>no topics</p>
    @endforelse
@endsection