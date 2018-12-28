@extends('template')
@section('content')
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                <h1>Upload Profile Image</h1>
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                     <input type="file" name="picture" id="picture" class="d-block mb-2">
                     <input type="submit" class="btn btn-success btn-sm" value="Upload">    <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Back</a>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection