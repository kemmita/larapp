@extends('template')
@section('content')
    <div class="container mt-5">
        <h1>Edit Question</h1>
        <hr>
        <form  action="{{ route('question.update', $question->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="title">Question</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="{{$question->title}}">
            <label for="description"></label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="{{$question->description}}"></textarea>
            <input type="submit" class="btn btn-primary" value="Submit Edits">    <a href="{{ route('home') }}" class="btn btn-warning float-right">Back</a>
        </form>
    </div>
@endsection