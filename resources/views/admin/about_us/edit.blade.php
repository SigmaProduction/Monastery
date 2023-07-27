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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('admin.about_us.update') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $aboutUs->subtitle) }}">
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $aboutUs->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $aboutUs->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $aboutUs->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                callbacks: {
                    onImageUpload: function(files) {
                        if (files.length > 1) {
                            alertError('You can only upload one image at a time.');
                            return;
                        }
                        var data = new FormData();
                        data.append("image", files[0]);
                        data.append("about_us_id", {{ $aboutUs->id }});
                        $.ajax({
                            url: '{{ route('admin.about_us.upload_image') }}',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: data,
                            type: "post",
                            success: function(response) {
                                var image = $('<img>').attr('src', response.url);
                                $('#content').summernote("insertNode", image[0]);
                            },
                            error: function(data) {
                                var errorMessage = 'An error occurred during image upload.';
                                if (data && data.responseJSON && data.responseJSON.message) {
                                    errorMessage = data.responseJSON.message;
                                }
                                // Display error message in a popup or any other desired way
                                alertError(errorMessage);
                            }
                        });
                    }
                }
            });
        });
    </script>
@stop
