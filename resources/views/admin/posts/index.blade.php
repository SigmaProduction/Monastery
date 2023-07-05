@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Posts</h3>
            <div class="card-tools">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create New Post</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ optional($post->category)->name }}</td>
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
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
