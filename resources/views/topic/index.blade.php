@extends('layouts.app')

@section('content')
    <h1>Topics</h1>
    @forelse($topics as $topic)
        <div class="card bg-light mb-3">
            <div class="card-header text-center">
            <a href="{{ route('topics.show', ['id' => $topic->id]) }}" class="display-4">
                {{ $topic->title }}
            </a>
            <small>{{ \Carbon\Carbon::parse($topic->created_at)->format('d/m/Y') }}</small>
            </div>
        </div>

    @empty
        <p>no topics</p>
    @endforelse
@endsection