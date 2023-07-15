@extends('layouts.admin')

@section('title', 'Create Image Slider')

@section('content_header')
    <h1>Create Image Slider</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('image_sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="url">Upload Image</label>
                    <input type="file" name="url" accept="image/*" id="url" class="form-control">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image_type">Image Type</label>
                    <select name="image_type" id="image_type" class="form-control">
                        @foreach($imageTypes as $type => $value)
                            <option value="{{ $value }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                    @error('image_type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="thumb">Thumbnail</label>
                    <input type="text" name="thumb" id="thumb" class="form-control" placeholder="Thumbnail">
                    @error('thumb')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('image_sliders.index') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
@stop
