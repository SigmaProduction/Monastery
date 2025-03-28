@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Posts</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.index') }}" method="get">
                <div class="input-group mb-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
                    </div>

                    <!-- Dropdown for menu_id -->
                    <div class="col-md-4">
                        <select class="form-control" id="menu_id" name="menu_id">
                            <option value="">Select Menu</option>
                            @foreach ($menus as $id => $name)
                                <option value="{{ $id }}" {{ (request('menu_id') == $id) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown for category_id -->
                    <div class="col-md-4">
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" data-menu-id="{{ $category->menu_id }}" {{ (request('category_id') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown for post_type -->
                    <div class="col-md-4">
                        <select class="form-control mt-2" name="post_type">
                            <option value="" {{ request('post_type') == null ? 'selected' : '' }}>Select Post type</option>
                            @foreach ($postTypes as $type => $value)
                                @if ($value == 0)
                                    <option value="{{ $value }}" {{ request('post_type') != null && request('post_type') == $value ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_', ' ', $type)) }}
                                    </option>
                                @else
                                    <option value="{{ $value }}" {{ request('post_type') == $value ? 'selected' : '' }}>
                                        {{ ucfirst(str_replace('_', ' ', $type)) }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mt-2">
                            <label for="is_hide" id="is_hide_label" class="form-group">Is Hide
                                <input type="checkbox" id="is_hide" name="is_hide" value="1" {{ old('is_hide') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mt-2">
                            <label for="is_important" id="is_important_label" class="form-group">Is Important
                                <input type="checkbox" id="is_important" name="is_important" value="1" {{ old('is_important') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>

                    <div class="input-group col-md-3">
                        <button type="submit" class="btn btn-primary form-control mt-2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Posts</h3>
            <div class="card-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create New Post</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Category</th> <!-- Change from Category ID to Category -->
                            <th>Description</th>
                            <th>Is Hide</th>
                            <th>Is Important</th>
                            <th>Image</th>
                            <th>Post Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->menu->name ?? '' }}</td>
                                <td>{{ $post->category->name ?? '' }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->is_hide ? 'Yes' : 'No' }}</td>
                                <td>{{ $post->is_important ? 'Yes' : 'No' }}</td>
                                <td>
                                    @if($post->image)
                                        <img src="/{{ $post->image }}" alt="{{ $post->title }}" style="width: 50px; height: 50px;"> <!-- Display Image -->
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $post->post_type }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.posts.archive', $post) }}" method="POST" style="display: inline-block;" onsubmit="return handleSubmit(this, 'Are you sure you want to archive this post?');">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-sm btn-danger">Archive</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No results found for the given filters.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
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
    </script>
@stop
