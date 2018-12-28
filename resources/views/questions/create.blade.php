@extends('template')
@section('content')
    <div class="container mt-5">
        <h1>Ask a Question</h1>
        <hr>
        <form action="{{ route('question.store') }}" method="POST">
            {{ csrf_field() }}
            <label for="title">Question</label>
            <input type="text" name="title" id="title" class="form-control">
            <label for="description"></label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            <input type="submit" class="btn btn-primary" value="Submit Question">    <a href="{{ route('home') }}" class="btn btn-warning float-right">Back</a>
        </form>
    </div>
@endsection