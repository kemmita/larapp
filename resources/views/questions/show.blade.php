@extends('template')
@section('content')
    <div class="container">
        <h1 class="text-center">{{ $question->title }}</h1>
        <p class="lead text-center">{{ $question->description }}</p>
        <p>Submitted By: {{$question->user->name}}</p> {{$question->created_at->diffForHumans()}}
        <p>View user <a href="{{route('profile', $question->user->id)}}">{{$question->user->name}}'s</a> profile</p>

        <hr>

        <div class="row">
            <div class="col-md-6 mr-auto">
        <form action="{{ route('answers.store') }}" method="post">
            {{ csrf_field() }}
            @if($question->user->id == Auth::id())
                <h5 class="mt-3">Answer your own question?</h5>
            @else
            <h5 class="mt-3">Can You Answer This?</h5>
            @endif
            <textarea name="answer_content" rows="4" class="form-control"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id"/>
            <button>submit</button>
        </form>
            </div>
        </div>
        <hr>

        @if($question->answers->count() > 0)
        @foreach($question->answers as $answer)
            <div class="card col-md-6 mr-auto mb-3">
                <div class="card-body">
                    <p class="card-text"><small> <span class="d-block">Answered By: {{$answer->user->name}}</span> {{$answer->created_at->diffForHumans()}}</small> </p>
                <div class="card-text bg-info p-2">{{$answer->content}}</div>
                </div>
            </div>
        @endforeach
            @else
                <p class="lead">Be the first to answer!</p>
        @endif
    </div>
@endsection