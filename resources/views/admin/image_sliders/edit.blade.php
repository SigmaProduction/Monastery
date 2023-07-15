@extends('layouts.admin')

@section('title', 'Edit Image Slider')

@section('content_header')
    <h1>Edit Image Slider</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('image_sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="url">Image</label>
                    @if($slider->url)
                        <div>
                            <img src="{{ asset($slider->url) }}" alt="Current Image" style="width: 150px; height: 150px;">
                            <p>Current Image</p>
                        </div>
                    @endif
                    <input type="file" name="url" accept="image/*" id="url">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumb">Thumbnail</label>
                    <input type="text" name="thumb" class="form-control" id="thumb" value="{{ $slider->thumb }}" required>
                    @error('thumb')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image_type">Image Type</label>
                    <select name="image_type" id="image_type" class="form-control">
                        @foreach($slider->getImageTypes() as $type => $value)
                            <option value="{{ $value }}" {{ $slider->getAttributes()['image_type'] == $value ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
