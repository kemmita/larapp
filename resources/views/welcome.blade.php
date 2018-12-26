@extends('template')
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Ask A Question</h1>
        <p>Fragen sie Etwas und wir werden ein Antwort fur dich finden!</p>
        <p><a href="{{route('question.create')}}" class="btn btn-primary btn-lg" role="button">Ask Now</a></p>
    </div>
    <h2>Recent Questions</h2>
</div>
@endsection
