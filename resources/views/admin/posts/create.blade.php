@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Post</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="post_type" id="post_type_label">Post Type</label>
                    <select class="form-control" id="post_type" name="post_type">
                        @foreach ($postTypes as $type => $value)
                            <option value="{{ $value }}" {{ old('post_type') == $value ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $type)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title" id="title_label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url" id="url_label">Url</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="menu_id" id="menu_id_label">Menu ID</label>
                    <select class="form-control" id="menu_id" name="menu_id">
                        <option value="">Select Menu</option>
                        @foreach ($menus as $id => $name)
                            <option value="{{ $id }}" >{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id" id="category_id_label">Category ID</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" data-menu-id="{{ $category->menu_id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="saledieng_months_id" id="saledieng_months_id_label">Saledieng Months</label>
                    <select class="form-control" id="saledieng_months_id" name="saledieng_months_id">
                        <option value="">Select Saledieng Months</option>
                        @foreach ($saledieng_months as $id => $month)
                            <option value="{{ $id }}" >Tháng {{ $month }}</option>
                        @endforeach
                    </select>
                    @error('saledieng_months_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="saledieng_family_id" id="saledieng_family_id_label">Saledieng Family</label>
                    <select class="form-control" id="saledieng_family_id" name="saledieng_family_id">
                        <option value="">Select Saledieng Family</option>
                        @foreach ($saledieng_families as $saledieng_family)
                            <option value="{{ $saledieng_family->id }}" data-saledieng-id="{{ $saledieng_family->saledieng_month_id }}">
                                {{ $saledieng_family->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('saledieng_family_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" id="description_label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_hide" id="is_hide_label" class="form-group">Is Hide
                        <input type="checkbox" id="is_hide" name="is_hide" value="1" {{ old('is_hide') ? 'checked' : '' }}>
                    </label>

                    @error('is_hide')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_important" id="is_important_label" class="form-group">Is Important
                        <input type="checkbox" id="is_important" name="is_important" value="1" {{ old('is_important') ? 'checked' : '' }}>
                    </label>
                    @error('is_important')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" id="image_label">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content" id="content_label">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
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

            function toggleFields(postTypeVal) {
                if (postTypeVal.includes('2') || postTypeVal.includes('3') || postTypeVal.includes('4')) {
                    $('#title, #title_label, #url, #url_label').show(); // Show title and url and their labels
                    // Hide other fields and their labels
                    $('#description, #description_label, #content_label').hide();
                    // Disable the Summernote editor
                    // $('#content').summernote('destroy');
                    // $('#content').hide();
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

            // Initialize functions when menus select is changed category select's options will filter according to selected menu.
            // Category select's options will store menu_id data attribute. This data attribute will be used to filter category select's options.
            // Reset option select's options will be shown when menus select is changed.
            // the <option value="">Select Category</option> should keep in category select.
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

            $('#saledieng_months_id').change(function() {
                const salediengMonthsId = $(this).val();
                $('#saledieng_family_id option').each(function() {
                    if ($(this).data('saledieng-id') == salediengMonthsId) {
                        $(this).show();
                    } else {
                        if ($(this).val() == '') {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
                $('#saledieng_family_id').val('');
            });
        });
    </script>
@stop
