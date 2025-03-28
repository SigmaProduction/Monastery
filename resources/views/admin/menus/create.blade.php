@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Create New Menu')

@section('content_header')
    <h1>Create New Menu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/admin/menus') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('menu') is-invalid @enderror" placeholder="Enter menu name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
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
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@stop
