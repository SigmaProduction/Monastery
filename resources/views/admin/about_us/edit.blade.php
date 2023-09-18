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
                        <form action="{{ route('admin.about_us.update') }}" method="POST" enctype="multipart/form-data">
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

                            <!-- Top Image -->
                            <div class="form-group">
                                <label for="top_image">Top Image</label>
                                <input type="file" class="form-control @error('top_image') is-invalid @enderror" id="top_image" name="top_image" accept="image/*">
                                @if($aboutUs->top_image)
                                    <img src="{{ asset($aboutUs->top_image) }}" alt="Top Image" width="100" height="100">
                                @endif
                                @error('top_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dream 1 Image -->
                            <div class="form-group">
                                <label for="dream_1_image">Dream 1 Image</label>
                                <input type="file" class="form-control @error('dream_1_image') is-invalid @enderror" id="dream_1_image" name="dream_1_image" accept="image/*">
                                @if($aboutUs->dream_1_image)
                                    <img src="{{ asset($aboutUs->dream_1_image) }}" alt="Dream 1 Image" width="100" height="100">
                                @endif
                                @error('dream_1_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dream 2 Image -->
                            <div class="form-group">
                                <label for="dream_2_image">Dream 2 Image</label>
                                <input type="file" class="form-control @error('dream_2_image') is-invalid @enderror" id="dream_2_image" name="dream_2_image" accept="image/*">
                                @if($aboutUs->dream_2_image)
                                    <img src="{{ asset($aboutUs->dream_2_image) }}" alt="Dream 2 Image" width="100" height="100">
                                @endif
                                @error('dream_2_image')
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
