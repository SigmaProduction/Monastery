@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label id="post_type_label" for="post_type">Post Type</label>
                    <select class="form-control" id="post_type" name="post_type">
                        @foreach ($postTypes as $type => $value)
                            <option value="{{ $value }}" {{ $post->post_type == $type ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $type)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="title_label" for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="url_label" for="url">Url</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $post->url) }}">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="menu_id" id="menu_id_label">Menu ID</label>
                    <select class="form-control" id="menu_id" name="menu_id">
                        <option value="">Select Menu</option>
                        @foreach ($menus as $id => $name)
                            <option value="{{ $id }}" {{ $post->menu_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="category_id_label" for="category_id">Category ID</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-menu-id="{{ $category->menu_id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="description_label" for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $post->description) }}">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="is_hide_label" for="is_hide" class='form-group'>Is Hide
                        <input type="checkbox" id="is_hide" name="is_hide" value="1" {{ old('is_hide', $post->is_hide) ? 'checked' : '' }}>
                    </label>

                    @error('is_hide')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="is_important_label" for="is_important" class="form-group">Is Important
                        <input type="checkbox" id="is_important" name="is_important" value="1" {{ old('is_important', $post->is_important) ? 'checked' : '' }}>
                    </label>
                    @error('is_important')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="image_label" for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label id="content_label" for="content">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            const initSummernote = function(id) {
                $(id).summernote({
                    callbacks: {
                        onImageUpload: function(files) {
                            if (files.length > 1) {
                                alertError('You can only upload one image at a time.');
                                return;
                            };
                            const editor = $(this);
                            const url = "{{ route('admin.posts.upload_image') }}";
                            const formData = new FormData();
                            formData.append('file', files[0]);
                            $.ajax({
                                url: url,
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
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
            };

            $('#content').summernote({
                callbacks: {
                    onImageUpload: function(files) {
                        if (files.length > 1) {
                            alert('You can only upload one image at a time.');
                            return;
                        };
                        var editor = $(this);
                        var url = "{{ route('admin.posts.upload_image') }}";
                        var formData = new FormData();
                        formData.append('file', files[0]);
                        fetch(url, {
                            method: "POST",
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.url) {
                                editor.summernote('insertImage', data.url);
                            } else {
                                console.error('Image upload failed');
                            }
                        });
                    }
                }
            });

            function toggleFields(postTypeVal) {
                if (postTypeVal.includes('2') || postTypeVal.includes('3') || postTypeVal.includes('4')) {
                    $('#title, #title_label, #url, #url_label').show(); // Show title and url and their labels
                    // Hide other fields and their labels
                    $('#description, #description_label, #content_label').hide();
                    // Disable the Summernote editor
                    $('#content').summernote('destroy');
                    $('#content').hide();
                } else {
                    // Show all fields and their labels
                    $('#title, #title_label, #url, #url_label, #description, #description_label, #content_label').show();
                    $('#url, #url_label').hide();
                    // Enable the Summernote editor
                    initSummernote('#content');
                }
            }

            // Initialize fields
            toggleFields($('#post_type').val());

            // Update fields on change
            $('#post_type').change(function() {
                toggleFields($(this).val());
            });

            $('#menu_id').change(function() {
                const menuId = $(this).val();
                $('#category_id option').each(function() {
                    if ($(this).data('menu-id') == menuId) {
                        $(this).show();
                    } else {
                        if ($(this).val() == '') {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
                $('#category_id').val('');
            });
        });
    </script>
@stop
