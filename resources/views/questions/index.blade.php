@extends('template')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-3">Recent Questions:</h1>
        @foreach($questions as $q)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{$q->title}}</h3>
                    <p class="lead card-text">{{$q->description}}</p>
                    <a href="{{ route('question.show', $q->id) }}" class="btn btn-primary btn-sm">View Details</a>
                    @if($q->user->id == Auth::id())
                        <a href="question/{{$q->id}}/edit" class="btn btn-success">Update</a>
                    @endif
                </div>
            </div>
        @endforeach
        {{$questions->links()}}
    </div>
@endsection