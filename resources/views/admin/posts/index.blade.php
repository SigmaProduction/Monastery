@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Posts</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.index') }}" method="get">
                <div class="input-group mb-3">
                    <div class="col-md-2">
                        <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
                    </div>

                    <!-- Dropdown for category_id -->
                    <div class="col-md-4">
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (request('category_id') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown for post_type -->
                    <div class="col-md-4">
                        <select class="form-control" name="post_type">
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


                    <div class="input-group col-md-2">
                        <button type="submit" class="btn btn-primary form-control">Search</button>
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
                                    <form action="{{ route('admin.posts.archive', $post) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to archive this post?');">
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
