@extends('template')
@section('content')
    <div class="container">
        <h1 >{{$user->name}}'s Profile</h1>
        <img src="{{asset('storage/'.$user->profile_pic)}}" class="img-thumbnail" style="height: 50px; width: 50px;">
        <p class="text-center">
            See what {{$user->name}} has been up to on LaravelAnswers.
        </p>
        <div class="row">
            <div class="col-md-6">
                <h3>Questions</h3>
                @foreach($user->questions as $question)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$question->title}}</h4>
                            <p class="card-text">{{$question->description}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('question.show', $question->id)}}" class="btn btn-sm btn-info">More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6 ">
                <h3>Answers</h3>
                @foreach($user->answers as $answer)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$answer->question->title}}</h4>
                            <p class="card-text">{{$answer->content}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('question.show', $answer->question->id)}}" class="btn btn-sm btn-info">More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection