@extends('layouts.admin')

@section('title', 'About Us')

@section('content_header')
    <h1>About Us</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit About Us</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about_us.update') }}" method="POST">
                @csrf
                @method('POSt')

                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $aboutUs->subtitle }}">
                </div>


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $aboutUs->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $aboutUs->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ $aboutUs->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@stop
