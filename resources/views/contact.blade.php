@extends('template')
@section('content')
<div class="container">
    <h1 class="text-center">Contact Us</h1>
    <form action="{{ route('contact') }}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
        </div>
        <div class="form-group">
            <label for="message"><strong>Content:</strong></label>
            <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Send Email">
    </form>
</div>
@endsection