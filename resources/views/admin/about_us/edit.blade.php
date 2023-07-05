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
            $('#content').summernote({
                callbacks: {
                    onImageUpload: function(files) {
                        if (files.length > 1) {
                            alert('You can only upload one image at a time.');
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
                                if (data && data.responseJSON && data.responseJSON.error) {
                                    errorMessage = data.responseJSON.error;
                                }
                                // Display error message in a popup or any other desired way
                                alert(errorMessage);
                            }
                        });
                    }
                }
            });
        });
    </script>
@stop
