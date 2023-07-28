@extends('layouts.admin')

@section('title', 'Image Sliders')

@section('content_header')
    <h1>Image Sliders</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Sliders</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('image_sliders.index') }}" method="get">
                <div class="input-group mb-3">
                    <!-- Dropdown for post_type -->
                    <div class="col-md-4">
                        <select class="form-control" name="image_type">
                            <option value="" {{ request('image_type') == null ? 'selected' : '' }}>Select Image type</option>
                            @foreach ($imageTypes as $type => $value)
                                <option value="{{ $value }}" {{ request('image_type') == $value ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $type)) }}
                                </option>
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
            <h3 class="card-title">Image Sliders</h3>
            <div class="card-tools">
                <a href="{{ route('image_sliders.create') }}" class="btn btn-primary mb-3">Create Image Slider</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($image_sliders as $slider)
                    <tr>
                        <td>{{ $slider->thumb }}</td>
                        <td><img src="{{ asset($slider->url) }}" height="50px" width="50px" /></td>
                        <td>{{ $slider->image_type }}</td>
                        <td>
                            <a href="{{ route('image_sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('image_sliders.destroy', $slider->id) }}" method="POST" style="display: inline-block;" onsubmit="return handleSubmit(this, 'Are you sure you want to delete this slider?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No results found for the given filters.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $image_sliders->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop
