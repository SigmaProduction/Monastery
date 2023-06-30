@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Post</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="category_id">Category ID</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="is_hide">Is Hide</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="is_hide" name="is_hide" value="1" {{ old('is_hide') ? 'checked' : '' }}>
                                <span class="cr"><i class="cr-icon fas fa-check"></i></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="is_important">Is Important</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="is_important" name="is_important" value="1" {{ old('is_important') ? 'checked' : '' }}>
                                <span class="cr"><i class="cr-icon fas fa-check"></i></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="post_type">Post Type</label>
                    <select class="form-control" id="post_type" name="post_type">
                        @foreach ($postTypes as $type => $value)
                            <option value="{{ $value }}" {{ old('post_type') == $value ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $type)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@stop
