@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#mytopics"
                role="tab"
                aria-controls="home"
                aria-selected="true">My Topics</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                id="profile-tab"
                data-toggle="tab"
                href="#mycomments"
                role="tab"
                aria-controls="profile"
                aria-selected="false">My Comments</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="mytopics" role="tabpanel" aria-labelledby="home-tab">
            @forelse($topics as $topic)

                <div class="card bg-light mb-1">
                    <div class="card-header text-center">
                        <a href="{{ route('topics.show', ['id' => $topic->id]) }}">
                            {{ $topic->title }}
                        </a>
                    </div>
                </div>

            @empty
            you don't have any topics!

            @endforelse
        </div>
        <div class="tab-pane fade" id="mycomments" role="tabpanel" aria-labelledby="profile-tab">
            @forelse($comments as $comment)

                <div class="card bg-light mb-1">
                    <div class="card-header text-center">
                        commented on: <a href="{{ route('topics.show', ['id' => $comment->topic->id]) }}">
                            {{ $comment->topic->title }}
                        </a>
                        @ <small>{{ \Carbon\Carbon::parse($comment->created_at)->format('d/m/Y') }}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                    </div>
                </div>

            @empty
                you don't have any comments!

            @endforelse
        </div>
    </div>
@endsection